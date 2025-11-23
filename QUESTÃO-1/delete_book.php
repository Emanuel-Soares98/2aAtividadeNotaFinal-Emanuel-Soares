<?php
include 'database.php';

$idExcluir = $_POST['id'];

$db->query("DELETE FROM books WHERE id = $idExcluir");

header("Location: index.php");
exit();
?>
