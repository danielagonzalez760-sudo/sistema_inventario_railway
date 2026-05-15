<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $reserva = App\Models\Reserva::first();
    if (!$reserva) {
        echo "No hay reservas para probar.\n";
        exit;
    }
    
    echo "Enviando correo...\n";
    Illuminate\Support\Facades\Notification::route('mail', 'sislabpascualbravo@gmail.com')
        ->notify(new App\Notifications\ReservaNuevaAdmin($reserva));
        
    echo "¡EXITO! El correo fue entregado al servidor SMTP.\n";
} catch(\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
