<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
   public function updated(Item $item)
        {
            // La notificación se maneja ahora desde el ItemController 
            // (crearAlertaYNotificar y cerrarAlertasYNotificarReabastecido)
            // para evitar envíos duplicados.
        }
}