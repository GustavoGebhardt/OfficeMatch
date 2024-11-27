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
        <p class="text-user">Usuario</p>
    </header>
    <main>
        <div class="div-funcionario">
            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <div class="funcionario">
                <img src="./public/temp.png">
                <p class="titulo">Gustavo Gebhardt</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div class="stars">
                    <img src="./public/estrela-false.png">
                    <img src="./public/estrela-false.png">
                    <img src="./public/estrela-false.png">
                    <img src="./public/estrela-false.png">
                    <img src="./public/estrela-false.png">
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
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
        padding: 10px;
        border-radius: 7px;
        text-align: center;
        color: #000158;
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    header .text-user:after{
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    header .text-user:hover{
        background-color: red;
        color: black;
    }

    main {
        padding-top: 100px;
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
</style>