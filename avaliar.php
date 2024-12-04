<?php
    session_start();

    if (!isset($_SESSION['name'])) {
        header("location: login.php");
    }

    require_once __DIR__ . '/vendor/autoload.php';

    $funcionarios = Funcionario::findall();
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
        <a class="link-avaliar" href="./">Ranking</a>
        <?php echo "<a href='./logout.php' class='text-user'>Bem vindo, {$_SESSION['name']}!</a>" ?>
    </header>
    <main>
        <div class="carrossel">
            <?php foreach($funcionarios as $funcionario) {
                echo
                    "<div class='carrossel-item ativo'>
                        <div class='div-funcionario'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-arrow-left prev'><path d='m12 19-7-7 7-7'/><path d='M19 12H5'/></svg>
                            <div class='funcionario'>
                                <img src='". $funcionario->getImagem() ."' class='image-funcionario'>
                                <p class='titulo'>". $funcionario->getNome() ."</p>
                                <p>". $funcionario->getDescricao() ."</p>
                                <div class='stars'>
                                    <img src='./public/estrela-false.png'>
                                    <img src='./public/estrela-false.png'>
                                    <img src='./public/estrela-false.png'>
                                    <img src='./public/estrela-false.png'>
                                    <img src='./public/estrela-false.png'>
                                </div>
                            </div>
                            <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-arrow-right next'><path d='M5 12H14'/><path d='m12 5 7 7-7 7'/></svg>
                        </div>
                    </div>";
            }?>
        </div>
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
        padding-top: 100px;
        user-select: none;
        
    }

    main .div-funcionario{
        display: flex;
        align-items: center;
    }

    main .div-funcionario svg{
        margin: 30px;
    }

    main .div-funcionario .funcionario {
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 15px;
        color: #000158;
    }

    main .div-funcionario .funcionario .titulo {
        font-weight: 500;
        font-style: normal;
        font-size: 25px;
    }

    main .div-funcionario .funcionario img {
        width: 200px;
    }

    main .div-funcionario .funcionario .stars {
        display: flex;
    }

    main .div-funcionario .funcionario .stars img {
        width: 30px;
        height: 30px;
    }

    .carrossel {
        display: flex;
        overflow: hidden;
        width: 100%;
    }

    .carrossel-item {
        flex-shrink: 0;
        width: 100%;
        display: none;
    }

    .carrossel-item.ativo {
        display: block;
    }

    .prev, .next {
        cursor: pointer;
    }

    .image-funcionario{
        width: 200px;   /* Largura fixa */
        height: 200px;  /* Altura fixa */
        object-fit: cover;
        border-radius: 100%;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const carrosselItems = document.querySelectorAll(".carrossel-item");
        const prevButtons = document.querySelectorAll(".prev");
        const nextButtons = document.querySelectorAll(".next");
        let currentIndex = 0;

        function showSlide(index) {
            carrosselItems.forEach((item, i) => {
                item.classList.toggle("ativo", i === index);
            });
        }

        prevButtons.forEach((button) => {
            button.addEventListener("click", () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : carrosselItems.length - 1;
                showSlide(currentIndex);
            });
        });

        nextButtons.forEach((button) => {
            button.addEventListener("click", () => {
                currentIndex = (currentIndex < carrosselItems.length - 1) ? currentIndex + 1 : 0;
                showSlide(currentIndex);
            });
        });

        showSlide(currentIndex);
    });
</script>