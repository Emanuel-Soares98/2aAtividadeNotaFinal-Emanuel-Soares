<?php
include 'database.php';

$id = $_POST['id'];
$titulo = $_POST['title'];
$autor = $_POST['author'];
$ano = $_POST['year'];

$db->query("INSERT INTO books (id, title, author, year) VALUES ($id, '$titulo', '$autor', $ano)");

header("Location: index.php");
exit();
?>
