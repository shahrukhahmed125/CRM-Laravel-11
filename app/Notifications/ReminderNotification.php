<?php

namespace App\Notifications;

use App\Models\Reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReminderNotification extends Notification
{
    use Queueable;
    protected $reminder;
    /**
     * Create a new notification instance.
     */
    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->subject('Reminder Notification')
    //                 ->line('This is a reminder for the following interaction:')
    //                 ->line('Type: ' . $this->reminder->interaction->type)
    //                 ->line('Details: ' . $this->reminder->interaction->details)
    //                 ->line('Scheduled for: ' . $this->reminder->reminder_at)
    //                 ->action('View Interaction', url('/interactions/' . $this->reminder->interaction->id))
    //                 ->line('Thank you for using our CRM!');
    // }


    public function toDatabase($notifiable)
    {
        return [
            'interaction_id' => $this->reminder->interaction_id,
            'interaction_type' => $this->reminder->interaction->type,
            'interaction_details' => $this->reminder->interaction->details,
            'reminder_at' => $this->reminder->reminder_at,
            'user_id' => $this->reminder->interaction->user_id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         'interaction_id' => $this->reminder->interaction->id,
    //         'details' => $this->reminder->interaction->details,
    //         'reminder_at' => $this->reminder->reminder_at,
    //     ];
    // }
}
