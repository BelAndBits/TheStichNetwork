<?php

namespace App\Listeners;

use App\Models\Library;
use App\Events\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class CreateUserLibrary
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
    public function handle(NewUserRegistered $event): void
    {
        try {
            Library::create([
                'user_id' => $event->user->user_id,
            ]);
        } catch (\Exception $e) {
            Log::error("Error creating library: " . $e->getMessage());
        }
    }
}
