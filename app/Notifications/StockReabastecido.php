<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class StockReabastecido extends Notification
{
    use Queueable;

    public $item;
    public $cantidad;

    public function __construct($item, $cantidad)
    {
        $this->item = $item;
        $this->cantidad = $cantidad;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('✅ Stock Reabastecido - ' . $this->item)
            ->view('emails.stock_reabastecido', [
                'item'     => $this->item,
                'cantidad' => $this->cantidad,
            ]);
    }
}