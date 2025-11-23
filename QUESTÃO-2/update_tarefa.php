<?php
include 'database.php';

$id = $_GET['id'] ?? 0;

$db->query("UPDATE tarefas SET concluida = 1 WHERE id = $id");

header("Location: index.php");
exit;
?>
