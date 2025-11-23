<?php
include 'database.php';

function formatarData($data) {
    return $data ? date("d/m/Y", strtotime($data)) : "-";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>

    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .form-box { background: #fff; padding: 15px; width: 60%; margin: auto; border-radius: 5px; }
        ul { list-style: none; padding: 0; }
        li { background: #fff; padding: 10px; margin-bottom: 8px;
             border-radius: 5px; display: flex; justify-content: space-between; }
        .concluida { text-decoration: line-through; color: gray; }
        .descricao-tarefa { font-weight: bold; } /* agora o negrito vem do CSS */
    </style>

    <script>
        function confirmarExclusao() {
            return confirm("Você realmente quer excluir esta tarefa?");
        }
    </script>
</head>
<body>

<h1 style="text-align:center;">Gerenciador de Tarefas</h1>

<div class="form-box">
    <form action="add_tarefa.php" method="POST">
        <input type="text" name="descricao" placeholder="Digite a tarefa..." required>
        <input type="date" name="data_vencimento">
        <button type="submit">Salvar</button>
    </form>
</div>

<hr>

<h2>Tarefas Pendentes</h2>
<ul>
<?php
$pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento");

foreach ($pendentes as $tarefa):
?>
    <li>
        <span>
            <span class="descricao-tarefa"><?php echo htmlspecialchars($tarefa['descricao']); ?></span>
            (<?php echo formatarData($tarefa['data_vencimento']); ?>)
        </span>

        <span>
            <a href="update_tarefa.php?id=<?php echo $tarefa['id']; ?>">Concluir</a>
            <a href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>" onclick="return confirmarExclusao()">Excluir</a>
        </span>
    </li>
<?php endforeach; ?>
</ul>


<h2>Tarefas Concluídas</h2>
<ul>
<?php
$concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento");

foreach ($concluidas as $t2):
?>
    <li>
        <span class="concluida">
            <span class="descricao-tarefa"><?php echo htmlspecialchars($t2['descricao']); ?></span>
            (<?php echo formatarData($t2['data_vencimento']); ?>)
        </span>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>
