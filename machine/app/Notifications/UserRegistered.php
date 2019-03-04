<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $confirmation_code;

    public function __construct($user)
    {
        $this->user = $user;
        $this->confirmation_code = substr(md5(($this->user->email).'giis') , 0, 20);;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->user->email;
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Verification Link')
                ->line("Thanks for signing up at ".config('app.name', 'Laravel')."! We're excited to have you as an early user.")
                ->action('Verify Email', url('/register/verify/'.$this->confirmation_code))
                ->line('If you did not request an account creation, no further action is required.');

            /*return (new MailMessage)
                    ->subject()
                    ->markdown('mail.user.registered', [
                            'name' => $this->user->name,
                            'confirmation_code' => $this->confirmation_code
                        ]);*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
