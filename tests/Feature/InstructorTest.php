<?php

namespace Tests\Feature;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\ClassTypeSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     */
    public function test_instructor_is_redirected_to_instructor_dashboard(){
        $user = User::factory()->create([
            'role' => 'instructor',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertRedirectToRoute('instructor.dashboard');

        $this->followRedirects($response)->assertSeeText("Hi Instructor");
    }

    public function test_instructor_can_schedule_a_class(){
        // setting up the environment - GIVEN
        $user = User::factory()->create([
            'role' => 'instructor',
        ]);

        $this->seed(ClassTypeSeeder::class);

        // taking an action - WHEN
        $response = $this->actingAs(($user))
            ->post('instructor/schedule',[
            'class_type_id' => ClassType::first()->id,
            'date' => '2023-12-20',
            'time' => '07:00:00'
        ]);

        // making assertions - THEN
        $this->assertDatabaseHas('scheduled_classes',[
            'class_type_id' => ClassType::first()->id,
            'date_time' => '2023-12-20 07:00:00',
        ]);
        $response->assertRedirectToRoute('schedule.index');
    }


    public function test_instructor_can_cancel_a_class(){
        // Given
        $user = User::factory()->create([
            'role' => 'instructor',
        ]);

        $this->seed(ClassTypeSeeder::class);

        $scheduledClass = ScheduledClass::create([
            'instructor_id' => $user->id,
            'class_type_id' => ClassType::first()->id,
            'date_time' => '2023-12-19 10:00:00'
        ]);

        // When
        $response = $this->actingAs($user)
        ->delete('/instructor/schedule/'.$scheduledClass->id);

        // Then
        $this->assertDatabaseMissing('scheduled_classes',[
            'id' => $scheduledClass->id
        ]);
    }
}
