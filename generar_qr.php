<?php
if (isset($_POST['generate'])) {
    // Recibe el nombre del evento, la fecha y la duración
    $title = $_POST['title'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    
    // Genera el código QR con la información
    include 'qrcode-generator.php'; // Incluye el generador de QR
    $qr_data = "Título: $title\nFecha: $date\nDuración: $duration horas\nID: " . uniqid();  // Crea un ID único para cada QR
    $qr_code = generateQRCode($qr_data); // Función para generar el QR
    
    // Guardar la información en una base de datos (opcional)
    // Aquí puedes guardar el QR o la información de asistencia
    // Ejemplo: 
    // $db->query("INSERT INTO asistencia (titulo, fecha, duracion, qr_data) VALUES ('$title', '$date', '$duration', '$qr_data')");
    
    echo $qr_code; // Muestra el código QR generado
}
?>
