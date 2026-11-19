<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    
    header("Location: index.html");
    exit();
}

$host = "localhost";
$dbname = "base-trabajo";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password_plana = $_POST['contraseña'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $fecha_creacion = date("Y-m-d"); 
        
        $sql = "SELECT nombre FROM usuarios WHERE correo = :correo";
        $comprobar = $conn->prepare($sql);

       
        $comprobar->execute([':correo' => $correo]);
        if($comprobar->rowCount() > 0) {
            echo "ese mail ya esta en uso";
        }
        else{
            if (empty($nombre) || empty($password_plana) || empty($apellido) || empty($dni) || empty($correo) || empty($usuario)){
                echo "todos los campos tiene que estar llenos";
            }else {
            $password_segura = password_hash($password_plana, PASSWORD_DEFAULT);

            
            $sql = "INSERT INTO usuarios (nombre, apellido, dni, correo, contraseña, usuario, fecha_creacion) VALUES (:nombre, :apellido, :dni, :correo, :contrasena, :usuario, :fecha_creacion)";
            $stmt = $conn->prepare($sql);
            
        
            $stmt->execute([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'dni' => $dni,
                'correo' => $correo,
                'contrasena' => $password_segura,
                'usuario' => $usuario,
                'fecha_creacion' => $fecha_creacion 
            ]);

            echo "<h3>¡Usuario registrado con éxito!</h3>";
            echo '<br><a href="index.html">Ir a Iniciar Sesión</a>';
        }
        }
            
        }}

catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}

?>