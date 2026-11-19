<?php

$host = "localhost";
$dbname = "base-trabajo";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password_plana = $_POST['contraseña'] ?? '';
        $nombre = $_POST['usuario'] ?? ''; 

        if (empty($nombre) || empty($password_plana)){
            echo "todos los campos tiene que estar llenos";
        } else {
            $password_segura = password_hash($password_plana, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO usuarios-administradores (nombre, contraseña) VALUES (:nombre, :contrasena)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute([
                'nombre' => $nombre,
                'contrasena' => $password_segura
            ]);

            echo "<h3>¡Administrador registrado con éxito!</h3>";
            echo '<br><a href="administrativo-ingresar.html">Ir a Iniciar Sesión</a>';
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>