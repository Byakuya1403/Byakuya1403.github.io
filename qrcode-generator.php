<?php
// Este archivo genera el código QR

function generateQRCode($data) {
    // Aquí va el código para generar el QR utilizando una librería como PHP QR Code
    require_once 'phpqrcode/qrlib.php'; // Usa la librería de PHP QR Code
    
    $filename = 'qr_temp.png'; // Guarda la imagen del QR
    
    // Genera el código QR
    QRcode::png($data, $filename);
    
    // Devuelve la imagen del QR generada
    return "<img src='$filename' alt='Código QR'>";
}
?>
