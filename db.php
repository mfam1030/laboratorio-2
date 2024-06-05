<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tarea";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function insertarMateria($nombre, $profesor) {
    global $db;
    $stmt = $db->prepare("INSERT INTO materia (nombre, profesor) VALUES (:nombre, :profesor)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':profesor', $profesor);
    $stmt->execute();
}

function buscarMaterias($nombre) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM materia WHERE nombre LIKE :nombre");
    $nombre = "%$nombre%";
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
