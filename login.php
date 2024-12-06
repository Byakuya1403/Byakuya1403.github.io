<?php
if (isset($_POST['login'])) {
    // Conectar a SQL Server
    $serverName = "localhost";
    $connectionOptions = array(
        "Database" => "AsistenciaDB",
        "Uid" => "sa", 
        "PWD" => "1234"
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    
    if(!$conn) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Recibe el nombre de usuario y la contraseña
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Verificar si el usuario existe
    $query = "SELECT * FROM Users WHERE Username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $query, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($user && password_verify($password, $user['Password'])) {
        // Login exitoso
        echo "Bienvenido, " . $user['Username'];

        // Generar QR
        $qr_data = "Usuario: " . $user['Username'] . "\nID: " . $user['UserID'];
        // Llamada al generador de QR (igual que en el ejemplo anterior)
        include 'qrcode-generator.php';
        $qr_code = generateQRCode($qr_data);
        echo $qr_code;
    } else {
        echo "Error de inicio de sesión.";
    }

    sqlsrv_close($conn);  // Cierra la conexión
}
?>
