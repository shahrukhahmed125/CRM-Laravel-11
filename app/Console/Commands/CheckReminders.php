<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use App\Notifications\ReminderNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckReminders extends Command
{
    protected $signature = 'reminders:check';
    protected $description = 'Check and send reminders';

    public function handle()
    {
        $this->info('Checking reminders at: ' . now()); // Debugging output

        $reminders = Reminder::where('reminder_at', '<=', now())->get();

        if ($reminders->isEmpty()) {
            $this->info('No reminders to process.');
            return;
        }

        $this->info('Reminders found: ' . $reminders->count()); // Debugging output

        foreach ($reminders as $reminder) {
            $this->info('Sending reminder for interaction ID: ' . $reminder->interaction_id); // Debugging output
            Notification::send($reminder->interaction->user, new ReminderNotification($reminder));
            $reminder->delete();
        }

        $this->info('Reminder notifications sent successfully.');
    }
}
