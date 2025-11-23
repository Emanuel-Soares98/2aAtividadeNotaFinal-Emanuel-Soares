<?php
include 'database.php';

$idTarefa = $_GET['id'];

$stmt = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
$stmt->bind_param("i", $idTarefa);
$stmt->execute();

header("Location: index.php");
exit;
?>
