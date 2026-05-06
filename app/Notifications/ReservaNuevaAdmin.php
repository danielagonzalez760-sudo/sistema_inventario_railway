<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reserva;

class ReservaNuevaAdmin extends Notification
{
    use Queueable;

    protected $reserva;

    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🔔 Nueva Reserva Pendiente de Aprobación')
            ->view('emails.reserva_nueva_admin', ['reserva' => $this->reserva]);
    }
}