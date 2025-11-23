<?php
include 'database.php';

$descricao = $_POST['descricao'] ?? '';
$vencimento = $_POST['data_vencimento'] ?? '';

$db->query("
    INSERT INTO tarefas (descricao, data_vencimento)
    VALUES ('$descricao', '$vencimento')
");

header("Location: index.php");
exit;
?>
