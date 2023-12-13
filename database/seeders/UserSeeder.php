<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ## a fixed user:
        User::factory()->create([
            'name' => 'wojcup@email.com',
            'email' => 'fixed@email.com',
        ]);

        ## a fixed user with type of instructor:
        User::factory()->create([
            'name' => 'Instructor A',
            'email' => 'wojcup+instructor1@email.com',
            'role' => 'instructor',
        ]);

        User::factory()->create([
            'name' => 'Instructor B',
            'email' => 'wojcup+instructor2@email.com',
            'role' => 'instructor',
        ]);

        User::factory()->create([
            'name' => 'Admin A',
            'email' => 'wojcup+admin1@email.com',
            'role' => 'admin',
        ]);


        User::factory()->count(10)->create();
        
        User::factory()->count(10)->create([
            'role' => 'instructor'
        ]);

        ## Conventional way:
        ## DB::table('users')->insert(['name'=>'User Name', 'email' => 'user@email.com', 'role' => 'member']);
    }
}
