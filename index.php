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
        <p class="text-user">Usuario</p>
    </header>
    <main>
        <div class="ranking">
            <img src="./public/temp.png">
            <p>Gustavo Gebhardt</p>
            <div class="stars">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-false.png">
                <img src="./public/estrela-false.png">
            </div>
            <p>(10)</p>
        </div>
        <div class="ranking">
            <img src="./public/temp.png">
            <p>Gustavo Gebhardt</p>
            <div class="stars">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-true.png">
                <img src="./public/estrela-false.png">
                <img src="./public/estrela-false.png">
            </div>
            <p>(10)</p>
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
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-top: 40px;
    }

    main .ranking {
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    main .ranking img {
        width: 50px;
    }

    main .ranking .stars {
        display: flex;
    }

    main .ranking .stars img {
        width: 30px;
        height: 30px;
    }
</style>