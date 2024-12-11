<?php
    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    if (!isset($_SESSION['id'])) {
        header("location: login.php");
    }

    if(isset($_POST['nota'])){
        echo $_POST['nota'];
        echo $_SESSION['id'];
        $avaliacao = new Avaliacao($_SESSION['id'],$_POST['id'],$_POST['nota']);
        $avaliacao->save();
        header("location: avaliar.php");
    }

    $funcionarios = Funcionario::findall();
    $avaliacoes = Avaliacao::findall();

    foreach ($funcionarios as $key => $funcionario){
        foreach ($avaliacoes as $avaliacao){
            if($funcionario->getIdFuncionario() == $avaliacao->getIdFuncionario() && $avaliacao->getIdUser() == $_SESSION['id']){
                unset($funcionarios[$key]);
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
</head>
<body>
    <header>
        <a class="titulo" href="./">OfficeMatch.</a>
        <a class="link-avaliar" href="./">Ranking</a>
        <?php echo "<a href='./logout.php' class='text-user'>Bem vindo, {$_SESSION['name']}!</a>" ?>
    </header>
    <main>
        <div class="carrossel">
            <?php if (empty($funcionarios)): ?>
                <div class="sem-funcionarios"><p>Você ja avaliou todos os funcionários.</p></div>
            <?php else: ?>
                <?php foreach($funcionarios as $funcionario) {
                    echo
                        "<div class='carrossel-item ativo'>
                            <div class='div-funcionario'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-arrow-left prev'><path d='m12 19-7-7 7-7'/><path d='M19 12H5'/></svg>
                                <div class='funcionario'>
                                    <img src='". $funcionario->getImagem() ."' class='image-funcionario'>
                                    <p class='titulo'>". $funcionario->getNome() ."</p>
                                    <p>". $funcionario->getDescricao() ."</p>
                                    <form class='stars' method='POST' action='avaliar.php'>
                                        <input type='hidden' name='id' value='". $funcionario->getIdFuncionario() ."'>
                                        <button class='buttonStar' type='submit' name='nota' value='1'><img src='./public/estrela-false.png' data-true='./public/estrela-true.png' data-false='./public/estrela-false.png' class='estrela'></button>
                                        <button class='buttonStar' type='submit' name='nota' value='2'><img src='./public/estrela-false.png' data-true='./public/estrela-true.png' data-false='./public/estrela-false.png' class='estrela'></button>
                                        <button class='buttonStar' type='submit' name='nota' value='3'><img src='./public/estrela-false.png' data-true='./public/estrela-true.png' data-false='./public/estrela-false.png' class='estrela'></button>
                                        <button class='buttonStar' type='submit' name='nota' value='4'><img src='./public/estrela-false.png' data-true='./public/estrela-true.png' data-false='./public/estrela-false.png' class='estrela'></button>
                                        <button class='buttonStar' type='submit' name='nota' value='5'><img src='./public/estrela-false.png' data-true='./public/estrela-true.png' data-false='./public/estrela-false.png' class='estrela'></button>
                                    </form>
                                </div>
                                <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-arrow-right next'><path d='M5 12H14'/><path d='m12 5 7 7-7 7'/></svg>
                            </div>
                        </div>";
                }?>
            <?php endif; ?>
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
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 100%;
    }

    .buttonStar{
        border: none;
        background-color: transparent;
    }

   .sem-funcionarios{
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
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

    document.addEventListener("DOMContentLoaded", () => {
        const carrosselItems = document.querySelectorAll(".carrossel-item");
        const prevButtons = document.querySelectorAll(".prev");
        const nextButtons = document.querySelectorAll(".next");
        const estrelas = document.querySelectorAll(".estrela");

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

        estrelas.forEach((estrela) => {
            estrela.addEventListener("mouseover", () => {
                estrela.src = estrela.getAttribute("data-true");
            });

            estrela.addEventListener("mouseout", () => {
                estrela.src = estrela.getAttribute("data-false");
            });
        });
    });

</script>