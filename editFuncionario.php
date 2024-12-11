<?php
session_start();
require_once 'src/MySQL.php'; 

if (!isset($_SESSION['nome']) != 'admin') {
    header("Location: ranking.php");
    exit();
}   

$mysql = new MySQL();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $imagem = "public/funcionariosFotos/" . $_FILES['imagem']['name'];

    
    if (!empty($imagem)) {
        $target_dir = "public/funcionariosFotos/";  
        $target_file = $target_dir . basename($imagem);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file);
    } else {
        
        $sql = "SELECT imagem FROM funcionario WHERE id = $id";
        $dadosFuncionario = $mysql->consulta($sql);
        $imagem = $dadosFuncionario[0]['imagem'];
    }

    
    $sql = "UPDATE funcionario SET nome = '$nome', descricao = '$descricao', imagem = '$imagem' WHERE id = $id";
    $mysql->executa($sql);

   
    header("Location: dashboardAdmin.php");
    exit();
}


if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; 

    
    $sql = "SELECT nome, descricao, imagem FROM funcionario WHERE id = $id";
    $dadosFuncionario = $mysql->consulta($sql);

    
    if (count($dadosFuncionario) > 0) {
        $nome = $dadosFuncionario[0]['nome'];
        $descricao = $dadosFuncionario[0]['descricao'];
        $imagem = $dadosFuncionario[0]['imagem'];
    } else {
        echo "Funcionário não encontrado.";
        exit(); 
    }
} else {
    echo "ID não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>

    <header>
        <a class="titulo" href="dashboardAdmin.php">OfficeMatch.</a>
        <a href="dashboardAdmin.php" class="link-avaliar">Dashboard</a>
        <?php 
            if (isset($_SESSION['name'])) {
                echo "<a href='./logout.php' class='text-user'>Bem vindo, {$_SESSION['name']}!</a>";
            } else {
                echo "<a href='./index.php' class='text-user'>Login</a>";
            }
        ?>
        
    </header>

    <div class="container">
        <form class="form" action="editFuncionario.php" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input class="input" type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

            <label for="descricao">Descrição:</label>
            <input class="input" type="text" id="descricao" name="descricao" value="<?php echo $descricao; ?>" required>

            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <button type="submit" class="btnSubmit">Salvar alterações</button>
        </form>
    </div>
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
        width: 120px;
        height: 30px;
        margin-top: 20px;
        align-self: center;
        border: none;
    }

    .form {
        width: 100vw;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 40px;
    }


    .container{
        width: 100vw;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input{
        height: 40px;
        border: 2px solid #FFFF7;
        border-radius: 7px;
        margin-bottom: 10px;
        padding: 4px;
    }
</style>