<<?php
include 'database.php';

$id     = $_POST['id'];
$title  = $_POST['title'];
$author = $_POST['author'];
$year   = $_POST['year'];

$stmt = $db->prepare("INSERT INTO books (id, title, author, year) VALUES (?, ?, ?, ?)");
$stmt->execute([$id, $title, $author, $year]);

header("Location: index.php");
exit();
?>
