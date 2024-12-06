<?php
if (isset($_POST['register'])) {
    // Conectar a SQL Server
    $serverName = "localhost";
    $connectionOptions = array(
        "Database" => "AsistenciaDB",
        "Uid" => "sa", // Usuario
        "PWD" => "1234" // Contraseña
        "Puerto" => 1433 // Puerto

    );
    $conn = sqlsrv_connect( $serverName, $connectionOptions );
    
    if( !$conn ) {
        die( print_r(sqlsrv_errors(), true));
    }

    // Recibe el nombre de usuario y la contraseña
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Se usa hash para la contraseña
    
    // Inserta el usuario en la base de datos
    $query = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
    $params = array($username, $password);
    $stmt = sqlsrv_query($conn, $query, $params);
    
    if($stmt) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar el usuario.";
    }

    sqlsrv_close($conn);  // Cierra la conexión
}
?>
