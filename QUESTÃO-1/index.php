<?php
include 'database.php';

$listaLivros = $db->query("SELECT * FROM books ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <style>
        h1 { text-align: center; }
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        .container { 
            width: 700px; 
            margin: auto; 
            background: white; 
            padding: 25px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px #ccc; 
        }
        input, button { 
            width: 100%; 
            padding: 8px; 
            margin-top: 5px; 
            display: block; 
            box-sizing: border-box; 
        }
        button { 
            background: #000080; 
            color: white; 
            border: none; 
            border-radius: 4px; 
        }
        button:hover { background: #000050; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ccc; 
            padding: 10px; 
            text-align: center; 
        }
        th { background: #000080; color: white; }
        .delete-btn { background: #b60f09; }
        .delete-btn:hover { background: #700b07; }
    </style>
</head>
<body>
<div class="container">

    <h1>Livraria</h1>

    <h2>Adicionar Livro</h2>
    <form id="addForm" action="add_book.php" method="POST">
        ID: <input type="number" name="id" id="id">
        Título: <input type="text" name="title" id="title">
        Autor: <input type="text" name="author" id="author">
        Ano: <input type="number" name="year" id="year">
        <button type="submit">Salvar</button>
    </form>

    <h2>Excluir Livro</h2>
    <form id="deleteForm" action="delete_book.php" method="POST">
        ID do livro: <input type="number" name="id" id="delete_id">
        <button class="delete-btn" type="submit">Excluir</button>
    </form>

    <h2>Livros Cadastrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
        </tr>
        <?php foreach ($listaLivros as $livro) { ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= $livro['title'] ?></td>
            <td><?= $livro['author'] ?></td>
            <td><?= $livro['year'] ?></td>
        </tr>
        <?php } ?>
    </table>

</div>
<script>
    document.getElementById("addForm").addEventListener("submit", function(e) {
        const id = document.getElementById("id");
        const title = document.getElementById("title");
        const author = document.getElementById("author");
        const year = document.getElementById("year");

        if (!id.value || !title.value || !author.value || !year.value) {
            alert("Preencha todos os campos.");
            e.preventDefault();
        }
    });

    document.getElementById("deleteForm").addEventListener("submit", function(e) {
        const delId = document.getElementById("delete_id");
        if (!delId.value) {
            alert("Digite o ID para excluir.");
            e.preventDefault();
        }
    });
</script>
</body>
</html>
