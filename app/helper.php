
<?php

// use App\Models\Reminder;
// use App\Notifications\ReminderNotification;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Notification;

    // if (!function_exists('checkAndSendReminders')) {
    //     function checkAndSendReminders()
    //     {
    //         // Get the current time up to the minute
    //         $currentTime = Carbon::now()->format('Y-m-d H:i');

    //         // Fetch reminders that are due
    //         $reminders = Reminder::whereRaw("DATE_FORMAT(reminder_at, '%Y-%m-%d %H:%i') <= ?", [$currentTime])->get();
            
    //         if ($reminders->isEmpty()) {
    //             return 'No reminders to process.';
    //         }
    
    //         // Send notifications and delete reminders
    //         foreach ($reminders as $reminder) {
    //             Notification::send($reminder->interaction->user, new ReminderNotification($reminder));
    //             $reminder->delete();
    //         }
    
    //         return 'Reminder notifications sent successfully.';
    //     }
    // }
    
?>