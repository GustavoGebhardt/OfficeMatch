<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header("location: ranking.php");
    }

    if(isset($_POST)){
        require_once __DIR__ . '/vendor/autoload.php';

        if(isset($_POST['email']) && isset($_POST['password'])){
            $user = User::findWithEmail($_POST['email']);
            if(!$user || $user->getSenha() != $_POST['password']){
                echo "<style>
                        .popup {
                            position: fixed;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            background-color: white;
                            border-radius: 8px;
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                            width: 300px;
                            padding: 20px;
                            text-align: center;
                            z-index: 1000;
                            display: block; /* Inicialmente oculto */
                        }

                        .popup button {
                            background-color: #000158;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            padding: 10px 20px;
                            cursor: pointer;
                            font-size: 16px;
                        }
                    </style>
                    <div class='popup' id='popup'>
                        <p>Usuario ou senha incorretos. Por favor tente novamente!</p>
                        <button onclick='closePopup()'>OK</button>
                    </div>
                    <script>
                        function closePopup() {
                            document.getElementById('popup').style.display = 'none';
                            document.getElementById('overlay').style.display = 'none';
                        }
                    </script>";
            } else {
                session_start();

                $_SESSION['name'] = $user->getNome();
                $_SESSION['id'] = $user->getIdUser();
    
                header("location: avaliar.php");
            }
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playwrite+US+Modern:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="master">
        <div class="div-logo">
            <h1 class="poppins-semibold">Office Match.</h1>
        </div>
        <div class="div-form">
            <form action="index.php" method="POST">
                <label class="poppins-semibold">Email</label>
                <input type="email" name="email" placeholder="Informe seu email" require>

                <label class="poppins-semibold">Senha</label>
                <input type="password" name="password" placeholder="Informe sua senha" require>

                <button class="btnSubmit poppins-semibold" type="submit">Entrar</button>

                <div class="account-already">
                    <p class="p1">Não tem uma conta?</p>
                    <a href="signup.php">Criar conta</a>
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
        border: none;
    }
</style>