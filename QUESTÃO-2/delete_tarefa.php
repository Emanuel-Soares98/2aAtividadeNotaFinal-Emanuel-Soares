<?php
include 'database.php';

$id = $_GET['id'] ?? 0;

$db->query("DELETE FROM tarefas WHERE id = $id");

header("Location: index.php");
exit;
?>
