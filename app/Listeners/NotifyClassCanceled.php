<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Mail\ClassCanceledMail;
use Illuminate\Support\Facades\Log;
use App\Jobs\NotifyClassCanceledJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassCanceledNotification;


class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {
        $members = $event->scheduledClass->members()->get();

        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->date_time;

        $details = compact('className','classDateTime');

        NotifyClassCanceledJob::dispatch($members, $details);

        ## Other methods to notify users
        // Notification::send($members, new ClassCanceledNotification($details));

        // $members->each(function($user) use ($details){
        //     Mail::to($user)->send(new ClassCanceledMail($details));
        // });

        // Log::info($scheduledClass);
    }
}
