<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>public/css/style.css">
</head>

<body>

    <!-- Título antes del enlace -->
    <h1 class="titulo">Bienvenidos al Sistema de Control de Inventario</h1>

    <nav>
        <ul>
            <li>
                <a href="<?php echo RUTA_URL; ?>elementos">Elementos</a>
            </li>
        </ul>
    </nav>

</body>

</html>

<?php
class Paginas extends Controlador
{
    public function __construct() {}

    public function index()
    {
        $this->vista('paginas/inicio'); // Carga la vista inicio.php en /Views/paginas/
    }
}
?>