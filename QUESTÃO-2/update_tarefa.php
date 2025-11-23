<?php
include 'database.php';

$idTarefa = $_GET['id'];

$stmt = $conexao->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
$stmt->bind_param("i", $idTarefa);
$stmt->execute();

header("Location: index.php");
exit;
?>
