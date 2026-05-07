<?php

namespace App\Observers;

use App\Models\Item;
use App\Notifications\StockLowNotification;
use Illuminate\Support\Facades\Notification;

class ItemObserver
{
    public function updated(Item $item)
    {
        if ($item->isDirty('cantidad') && $item->cantidad <= $item->umbral_minimo) {
            try {
                Notification::route('mail', config('mail.from.address'))
                    ->notify(new StockLowNotification($item->nombre, $item->cantidad));
            } catch (\Exception $e) {}
        }
    }
}