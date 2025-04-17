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
    <title>Contador de palabras</title>
</head>

<body class="bg-primary bg-gradient bg-opacity-25">

<div class="container mt-5">
  <div class="card shadow-lg rounded-4 p-4 mx-auto" style="max-width: 600px;">
    <h2 class="text-center text-primary fw-bold mb-4">Cuenta Palabras</h2>
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="contador" class="form-label">Contador</label>
        <textarea class="form-control" id="contador" name="contador" rows="4" placeholder="Escribe una frase..."></textarea>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary" name="enviar">Contar</button>
      </div>
    </form>
  </div>
</div>
    

</body>
</html>