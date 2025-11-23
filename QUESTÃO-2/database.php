<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'tarefas_db';

$conexao = new mysqli($host, $user, $pass, $dbname);

if ($conexao->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}

$sql = "
CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    data_vencimento DATE,
    concluida TINYINT(1) DEFAULT 0
)";
$conexao->query($sql);
?>
