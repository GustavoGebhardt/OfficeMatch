<?php    
    if(isset($_POST)){
        require_once __DIR__ . '/vendor/autoload.php';

        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
            $user = new User($_POST['name'],$_POST['password'],$_POST['email']);
            $user->save();

            session_start();

            $_SESSION['name'] = $user->getNome();

            header("location: avaliar.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/output.css" rel="stylesheet">
    <title>Office Match</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playwrite+US+Modern:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="master">
        <div class="div-logo">
            <h1 class="poppins-semibold">Office Match.</h1>
        </div>
        <div class="div-form">
            <form action="signup.php" method="POST">
                <label class="poppins-semibold">Nome</label>
                <input type="text" name="name" placeholder="Digite seu nome" require>

                <label class="poppins-semibold">Email</label>
                <input type="email" name="email" placeholder="Email" require>

                <label class="poppins-semibold">Senha</label>
                <input type="password" name="password" placeholder="Senha" require>

                <button class="btnSubmit poppins-semibold" type="submit">Criar Conta</button>
                <div class="account-already">
                    <p class="p1">Já tem uma conta?</p>
                    <a href="login.php">Fazer login</a>
                </div>

            </form>
        </div>
    </div>
</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .master {
        width: 100vw;
        height: 100vh;
        display: flex;
    }

    .poppins-semibold {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        font-style: normal;
    }

    .div-logo {
        width: 100%;
        color: #000158;
        font-size: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        position: relative;
    }

    
    .div-logo::after {
        content: "";
        position: absolute;
        right: 0;
        height: 80%; 
        width: 2.5px; 
        background-color: #d9d9d9; 
        top: 10%; 
    }

    .div-form{
        width: 60%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .div-form form {
        display: flex;
        flex-direction: column;
        width: 300px;
    }
    .div-form form label{
        color: #000158;
        font-size: 20px;
        margin-top: 4px;
        margin-bottom: 5px;
    }

    .account-already{
        font-size: 13px;
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    .account-already p{
        margin-right: 4px;
    }

    .div-form form input{
        width: 100%;
        height: 40px;
        border: 2px solid #000158;
        border-radius: 7px;
        margin-bottom: 1    0px;
        padding: 4px;

    }
    .btnSubmit {
        background-color: #000158;
        color: white;
        border-radius: 10px;
        width: 100px;
        height: 30px;
        margin-top: 20px;
        align-self: center;
    }
</style>