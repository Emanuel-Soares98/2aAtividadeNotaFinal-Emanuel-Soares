<?php

try {
    $db = new PDO("sqlite:".__DIR__."/tarefas.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->query("
        CREATE TABLE IF NOT EXISTS tarefas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            descricao TEXT NOT NULL,
            data_vencimento TEXT,
            concluida INTEGER DEFAULT 0
        )
    ");

} catch (Exception $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}

?>
