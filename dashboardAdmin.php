<?php
session_start();
require_once 'src/MySQL.php';

if (!isset($_SESSION['nome']) != 'admin') {
    header("Location: ranking.php");
    exit();
}

$mysql = new MySQL();

if (isset($_POST['delete']) &&  isset($_POST['id'])) {
    $id = $_POST['id'];


    $sql_delete_avaliacoes = "DELETE FROM avaliacao WHERE id_funcionario = $id";
    $mysql->executa($sql_delete_avaliacoes);

    $sql_delete_funcionario = "DELETE FROM funcionario WHERE id = $id";
    $mysql->executa($sql_delete_funcionario);

    header("Location: dashboardAdmin.php");
    exit();
}

$sql = "SELECT * FROM funcionario"; 
$funcionarios = $mysql->consulta($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/output.css" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<body>
    <header>
        <a class="titulo" href="dashboardAdmin.php">OfficeMatch.</a>
        <a href="addFuncionario.php" class="link-avaliar">Adicionar Funcionário</a>
        <a href="ranking.php" class="link-avaliar">Ranking</a>
        <?php 
            if (isset($_SESSION['name'])) {
                echo "<a href='./logout.php' class='text-user'>Bem vindo, {$_SESSION['name']}!</a>";
            } else {
                echo "<a href='./index.php' class='text-user'>Login</a>";
            }
        ?>
    </header>

    <main>
        <h2>Funcionários</h2>
        
        <?php foreach ($funcionarios as $funcionario): ?>
            <div class="background">
                <div class="ranking">
                    <img class="image-funcionario" src="<?php echo $funcionario['imagem']; ?>" alt="Imagem do Funcionário">
                    <p class="name"><?php echo $funcionario['nome']; ?></p>
                    <p class="description">Descrição: <?php echo htmlspecialchars($funcionario['descricao']); ?></p>
                    <div class="btnEditar">
                        <a href="editFuncionario.php?id=<?php echo $funcionario['id']; ?>" class="btnSubmit ">Editar</a>
                        
                        <form method="POST" action="dashboardAdmin.php">
                            <input type="hidden" name="id" value="<?php echo $funcionario['id']; ?>">
                            <button type="submit" name="delete" class="btnSubmit">Excluir</button>
                        </form>
                    </div>
                    
                
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    h2{
        text-align: center;
    }

    body {
        font-family: "Poppins", sans-serif;
    }

    header {
        width: 100vw;
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

    header .link-avaliar {
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #000158;
        text-decoration: none;
        text-align: center;
        border-radius: 7px;
        white-space: nowrap;
        box-sizing: border-box;
    }

    .text-user {
        width: 200px;
        padding: 10px;
        border-radius: 7px;
        text-align: center;
        color: #000158;
        text-decoration: none;
    }

    main {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-top: 40px;
    }

    .background {
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ranking {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 20px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        
    }

    .ranking img {
        width: 50px;
        height: 50px;   
        border-radius: 50%; 
        object-fit: cover;
    }

    .ranking p {
        margin: 0;
    }

    .ranking .name {
        font-weight: bold;
    }
    .btnSubmit {
        background-color: #000158;
        color: white;
        border-radius: 10px;
        width: 100px;
        height: 30px;
        margin-top: 20px;
        align-self: center;
        border: none;
    }
    .btnEditar{
        display: flex;
        text-align: center;
        justify-content: end;
    }
</style>
