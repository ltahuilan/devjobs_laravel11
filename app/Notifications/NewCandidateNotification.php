<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidateNotification extends Notification
{
    use Queueable; //encolable

    public $vacancy_id;
    public $vacancy_title;
    public $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacancy_id, $vacancy_title, $user_id)
    {
        //
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_title = $vacancy_title;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Has recibido una nueva notificación de la vacacante ' . $this->vacancy_title)
                    ->action('Notification Action', url('/notifications'))
                    ->line('Gracias por utilizar DevJobs');
    }

    public function toDatabase($notifiable)
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_title' => $this->vacancy_title,
            'user_id' => $this->user_id
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
