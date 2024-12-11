<?php
    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    $funcionarios = Funcionario::findall();
    $avaliacoes = Avaliacao::findall();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/output.css" rel="stylesheet">
    <title>Office Match</title>
</head>
<body>
    <header>
        <a class="titulo" href="./">OfficeMatch.</a>
        <a class="link-avaliar" href="./avaliar.php">Avaliar</a>
        <?php 
            if (isset($_SESSION['name'])) {
                echo "<a href='./logout.php' class='text-user'>Bem vindo, {$_SESSION['name']}!</a>";
            } else {
                echo "<a href='./login.php' class='text-user'>Login</a>";
            }
        ?>
    </header>
    <main>
        <?php foreach($funcionarios as $funcionario) {
            $nota = 0;
            $quantidade = 0;
            foreach ($avaliacoes as $avaliacao){
                if($funcionario->getIdFuncionario() == $avaliacao->getIdFuncionario()){
                    $nota += $avaliacao->getNota();
                    $quantidade++;
                }
            }
            if($quantidade != 0){
                $nota = $nota/$quantidade;
            }

            $notaNotRounded = number_format($nota, 2, '.', '');

            $nota = round($nota, 1);

            $esterla1 = ($nota >= 1) ? "./public/estrela-true.png" : "./public/estrela-false.png";
            $esterla2 = ($nota >= 2) ? "./public/estrela-true.png" : "./public/estrela-false.png";
            $esterla3 = ($nota >= 3) ? "./public/estrela-true.png" : "./public/estrela-false.png";
            $esterla4 = ($nota >= 4) ? "./public/estrela-true.png" : "./public/estrela-false.png";
            $esterla5 = ($nota >= 5) ? "./public/estrela-true.png" : "./public/estrela-false.png";

            echo
            "<div class='background'>
                <div class='ranking'>
                    <img class='image-funcionario' src='". $funcionario->getImagem() ."'>
                    <p class'name'>". $funcionario->getNome() ."</p>
                    <div class='stars'>
                        <img src='". $esterla1 ."'>
                        <img src='". $esterla2 ."'>
                        <img src='". $esterla3 ."'>
                        <img src='". $esterla4 ."'>
                        <img src='". $esterla5 ."'>
                    </div>
                    <p class'nota'>Nota: ". $notaNotRounded ."</p>
                    <p>Votos: (". $quantidade .")</p>
                </div>
            </div>";
        }?>
    </main>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins", sans-serif;
    }

    body header {
        width: 100vw;
        height: 90px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    header .titulo {
        color: #000158;
        font-weight: 600;
        font-style: normal;
        font-size: 30px;
        text-decoration: none;
    }

    header .link-avaliar{
        width: 100px;
        padding: 10px;
        color: white;
        background-color: #000158;
        text-decoration: none;
        text-align: center;
        border-radius: 7px;
    }

    header .text-user {
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

    main .background {
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    main .ranking {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    main .ranking img {
        width: 50px;
    }

    main .ranking p {
        width: 150px;
        text-align: center;
    }

    main .ranking .stars {
        display: flex;
    }

    main .ranking .stars img {
        width: 30px;
        height: 30px;
    }

    .image-funcionario{
        width: 50px;
        height: 50px;
        border-radius: 100%;
        object-fit: cover;
    }
</style>