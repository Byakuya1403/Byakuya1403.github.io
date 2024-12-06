<?php
if (isset($_GET['qr_data'])) {
    // Recuperar los datos del QR escaneado
    $qr_data = $_GET['qr_data'];  // Los datos pueden incluir el nombre, evento, ID único, etc.
    
    // Procesar la información, extraer el nombre del evento, ID, etc.
    list($title, $date, $duration, $user_id) = explode("\n", $qr_data);
    $user_id = trim(str_replace('ID: ', '', $user_id)); // Extrae el ID único
    
    // Aquí se puede agregar la lógica para registrar la asistencia
    // Ejemplo:
    // $db->query("INSERT INTO asistencia (user_id, title, date, duration) VALUES ('$user_id', '$title', '$date', '$duration')");
    
    // Mostrar confirmación de la asistencia
    echo "Asistencia registrada con éxito. ID de usuario: $user_id";
}
?>
