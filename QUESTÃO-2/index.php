<?php include 'database.php'; ?>

<?php
function formatarData($data) {
    if (empty($data)) return "-";
    return date("d/m/Y", strtotime($data));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
            color: #333;
        }
        h1, h2 {
            text-align: center;
        }
        .form-box {
            background: #fff;
            padding: 15px;
            margin: auto;
            width: 60%;
            border-radius: 5px;
            box-shadow: 0 0 8px #bbb;
        }
        input, button {
            padding: 10px;
            margin: 5px;
        }
        input[type=text], input[type=date] {
            width: 55%;
        }
        button {
            cursor: pointer;
            background: #091397ff;
            border: none;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            background: #05146bff;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: white;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .actions a {
            margin-left: 10px;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
        }
        .btn-concluir {
            background: #077a22ff;
        }
        .btn-excluir {
            background: #b60e0eff;
        }
        .btn-concluir:hover { background: #033d11ff; }
        .btn-excluir:hover { background: #700909ff; }

        .concluida {
            text-decoration: line-through;
            color: gray;
        }
        .descricao-tarefa {
            font-weight: bold;
        }
    </style>
    <script>
        function confirmarExclusao() {
            return confirm("Você realmente quer excluir esta tarefa?");
        }
    </script>
</head>
<body>

<h1>Gerenciador de Tarefas</h1>

<div class="form-box">
    <form action="add_tarefa.php" method="POST">
        <input type="text" name="descricao" placeholder="Digite sua tarefa aqui" required>
        <input type="date" name="data_vencimento">
        <button type="submit">Salvar tarefa</button>
    </form>
</div>

<hr>

<h2>Tarefas Pendentes</h2>
<ul>
<?php
$tarefasPendentes = $conexao->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento");
while ($tarefa = $tarefasPendentes->fetch_assoc()):
?>
    <li>
        <span>
            <span class="descricao-tarefa"><?php echo htmlspecialchars($tarefa['descricao']); ?></span>
            (<?php echo formatarData($tarefa['data_vencimento']); ?>)
        </span>
        <span class="actions">
            <a class="btn-concluir" href="update_tarefa.php?id=<?php echo $tarefa['id']; ?>">Marcar como feita</a>
            <a class="btn-excluir" href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>" onclick="return confirmarExclusao()">Excluir</a>
        </span>
    </li>
<?php endwhile; ?>
</ul>

<h2>Tarefas Concluídas</h2>
<ul>
<?php
$tarefasConcluidas = $conexao->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento");
while ($tarefa = $tarefasConcluidas->fetch_assoc()):
?>
    <li>
        <span class="concluida">
            <span class="descricao-tarefa"><?php echo htmlspecialchars($tarefa['descricao']); ?></span>
            (<?php echo formatarData($tarefa['data_vencimento']); ?>)
        </span>
    </li>
<?php endwhile; ?>
</ul>
</body>
</html>
