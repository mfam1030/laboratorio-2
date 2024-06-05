<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'] ?? '';
    $profesor = $_POST['profesor'] ?? '';
    insertarMateria($nombre, $profesor);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $nombre_busqueda = $_POST['nombre_busqueda'] ?? '';
    $materias = buscarMaterias($nombre_busqueda);
} else {
    $materias = buscarMaterias('');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Búsqueda de Materias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class= "caja">
    <h2>Registrar Materia</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="profesor">Profesor:</label>
        <input type="text" name="profesor" required>
        <input type="submit" name="registrar" value="Registrar Materia" class="btn">
    </form>

    <h2>Buscar Materia</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form">
        <label for="nombre_busqueda">Nombre:</label>
        <input type="text" name="nombre_busqueda">
        <input type="submit" name="buscar" value="Buscar" class="btn">
    </form>

    <h2>Listado de Materias</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</body>
</html>
