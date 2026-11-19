<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.html");
    exit();
}

$user = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Estudio de Maquillaje</title>
</head>

<body class="cuerpo-base pagina-panel">
    <div class="contenedor-panel">
        <div class="barra-superior">
      

            <form class="cerrar" action="cerrar_sesion.php" method="POST" class="formulario-sesion">
                <button type="submit" name="cerrar_sesion" class="sesion">Cerrar sesión</button>
            </form>
        </div>

        <div class="portada-estudio">
            <h1 class="titulo-portada">Tu Maquillaje en cada ocasión</h1>
        </div>

        <div id="servicios" class="seccion-estudio">
            
            <div class="grilla-tarjetas">
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Maquillaje Social</h3>
                    <p class="descripcion-servicio">Preparación de piel, corrección sutil y acabados adaptados a fiestas, cenas y celebraciones.</p>
                </article>
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Novias y Madrinas</h3>
                    <p class="descripcion-servicio">Prueba previa, armonía con el vestuario y fórmulas resistentes para acompañar toda la jornada.</p>
                </article>
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Eventos y Editorial</h3>
                    <p class="descripcion-servicio">Propuestas luminosas o de mayor intensidad pensadas para fotografía, producciones y salidas especiales.</p>
                </article>
            </div>
        </div>

        <div id="estilos" class="seccion-estudio">

            <div class="grilla-tarjetas">
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Piel Glow Natural</h3>
                    <p class="descripcion-servicio">Textura fresca y radiante que deja ver la naturalidad del rostro con cobertura modulable.</p>
                </article>
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Clásico Atemporal</h3>
                    <p class="descripcion-servicio">Delineado prolijo, tonos neutros cálidos y labios definidos que nunca pasan de moda.</p>
                </article>
                <article class="tarjeta-estudio">
                    <h3 class="titulo-servicio">Mirada Profunda</h3>
                    <p class="descripcion-servicio">Sombras difuminadas, pestañas trabajadas y contraste equilibrado para eventos nocturnos.</p>
                </article>
            </div>
        </div>

        <div id="mi-panel" class="seccion-estudio">
            <div class="panel_de_usuario">
                <h2 class="titulo-tarjeta">Panel de usuario</h2>
                <div class="dato-usuario">
                    <p name="usuario_panel" class="valor-dato">Usuario: <?php echo htmlspecialchars($user['usuario']); ?></p>
                </div>
                <div class="dato-usuario">
                    <p name="mail_panel" class="valor-dato">Correo: <?php echo htmlspecialchars($user['correo']); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>