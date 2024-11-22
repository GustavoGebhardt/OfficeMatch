<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Match</title>
</head>
<body>
    <div class="master">
        <div class="div-logo">
            <h1>Office Match</h1>
        </div>
        <div class="div-form">
            <form action="">
                <input type="email">
                <input type="password">
                <input type="submit">
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
    }

    .master {
        width: 100vw;
        height: 100vh;
        display: flex;
    }

    .div-logo{
        width: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: gray;
    }

    .div-form{
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .div-form form {
        display: flex;
        flex-direction: column;
    }
</style>