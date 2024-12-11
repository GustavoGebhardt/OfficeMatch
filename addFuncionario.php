<?php
session_start();

require_once 'src/MySQL.php';

$mysql = new MySQL();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        
        $imagem_nome = time() . '_' . $_FILES['imagem']['name'];
        
        $pasta_destino = 'uploads/imagens/';
        
        if (!is_dir($pasta_destino)) {
            mkdir($pasta_destino, 0777, true);
        }
        
        $caminho_imagem = $pasta_destino . $imagem_nome;
        move_uploaded_file($imagem_temp, $caminho_imagem);
    } else {
        $caminho_imagem = null;
    }

    $sql_check = "SELECT * FROM funcionario WHERE nome = '$nome'";
    $result_check = $mysql->executa($sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Funcionário já existe!');</script>";
    } else {
        $sql = "INSERT INTO funcionario (nome, descricao, imagem) VALUES ('$nome', '$descricao', '$caminho_imagem')";
        $mysql->executa($sql);
        echo "<script>alert('Funcionário adicionado com sucesso!');</script>";
        header("Location: dashboardAdmin.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/output.css" rel="stylesheet">
    <title>Adicionar Funcionário</title>
</head>
<body>
    <header>
        <a class="titulo" href="./">OfficeMatch.</a>
        <?php 
            if (isset($_SESSION['name'])) {
                if ($_SESSION['name'] == 'admin') {
                    echo "<a class='link-avaliar' href='./dashboardAdmin.php'>Dashboard</a>";
                } else {
                    echo "<a class='link-avaliar' href='./avaliar.php'>Avaliar</a>";
                }
                echo "<a href='./logout.php' class='text-user'>Bem-vindo, {$_SESSION['name']}!</a>";
            } else {
                echo "<a href='./index.php' class='text-user'>Login</a>";
            }
        ?>
    </header>
    
    <div class="container">
        <h1>Adicionar Funcionário</h1>
        
        <form action="addFuncionario.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" required></textarea>
            </div>
            <div>
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
            </div>
            <button type="submit" class="btnSubmit">Adicionar Funcionário</button>
        </form>
    </div>
</body>
</html>

<style>
    body {
        font-family: "Poppins", sans-serif;
    }

    header {
        width: 100%;
        height: 90px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .titulo {
        color: #000158;
        font-weight: 600;
        font-size: 30px;
        text-decoration: none;
    }

    .text-user {
        padding: 10px;
        border-radius: 7px;
        text-align: center;
        color: #000158;
        text-decoration: none;
    }

    .link-avaliar {
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #000158;
        text-decoration: none;
        text-align: center;
        border-radius: 7px;
    }

    .container {
        padding: 20px;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"], textarea, input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #000158;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #003366;
    }
</style>
