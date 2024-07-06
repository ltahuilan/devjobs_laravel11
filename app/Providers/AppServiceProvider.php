<?php

namespace App\Providers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing( function($notifiable, $url) {
            return (new MailMessage)
            // ->subject('Verifica tu cuenta en ' . env('APP_NAME'))
            ->subject( Lang::get('Verify Email Address in ' . env('APP_NAME') ))
            ->greeting('Hola ' . $notifiable->name . ':')
            ->line('Para verificar su dirección de correo electrónico, haga click en el siguiente botón.')
            ->action('Verificar Email', $url)
            ->line('Si no ha solicitado esta cuenta, no es necesario realizar ninguna otra acción e ignore este mensaje.')
            ->salutation( new HtmlString('Saludos.<br>El equipo de ' . '<strong>' . env('APP_NAME') . '</strong>'));
        });

    }
}
