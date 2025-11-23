<?php
include 'database.php';

$descricao = $_POST['descricao'];
$dataVencimento = $_POST['data_vencimento'];

$stmt = $conexao->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)");
$stmt->bind_param("ss", $descricao, $dataVencimento);
$stmt->execute();

header("Location: index.php");
exit;
?>
