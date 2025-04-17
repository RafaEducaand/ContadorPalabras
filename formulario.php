<?php
require_once("funciones.php");
// Mostrar el formulario si no se ha enviado texto
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    mostrarFormulario();
    exit;
}

// Paso 1: Obtener el texto
$texto = $_POST['texto'] ?? '';

// Paso 2: Procesarlo
$resultado = analizarTexto($texto);

// Paso 3: Mostrar resultado
mostrarResultado($resultado);


// ---------- FUNCIONES ----------
function mostrarFormulario()
{
    echo '
        <form method="POST">
            <textarea name="texto" rows="10" cols="60" placeholder="Introduce tu texto aquí..."></textarea><br><br>
            <input type="submit" value="Analizar">
        </form>
    ';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de  palabras</title>
</head>
<body>
    

    

</body>
</html>