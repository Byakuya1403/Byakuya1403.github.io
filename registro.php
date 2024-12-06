<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $repetirPassword = $_POST['repetir-password'];

    // Validar que las contraseñas coincidan
    if ($password !== $repetirPassword) {
        echo "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
        exit;
    }

    // Conexión a la base de datos
    $servername = "localhost"; // Cambia según tu configuración
    $username = "sa"; // Cambia según tu configuración
    $passwordDB = "1234"; // Cambia según tu configuración
    $dbname = "AsistenciaDB"; // Cambia según tu configuración

    // Crear la conexión
    $conn = new mysqli($servername, $username, $passwordDB, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO empleados (nombre, apellido, empresa, email, telefono, contraseña)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Usar una declaración preparada para evitar inyección SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $apellido, $empresa, $email, $telefono, $password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso para $nombre $apellido.";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
