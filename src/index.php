
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de palabras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once("funciones.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["enviar"])){
        // Paso 1: Obtener el texto
        $texto = $_POST['contador'] ?? '';

        // Paso 2: Procesarlo
        $resultado = analizarTexto($texto);

        // Paso 3: Mostrar resultado
        mostrarResultado($resultado);
    }
}

?>