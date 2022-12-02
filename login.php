<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: -o-linear-gradient(45deg,yellow,green);
        }
        .tela-login{
            background-color: black;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            width: 100%;


        }
        .inputSubmit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font: 15px;
        }
        .inputSubmit:hover{
            background-color: deepskyblue;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="tela-login">
        <h1>Login</h1>
        <form action="testelogin.php" method="POST">
        <input type="text" name="email" id="email" placeholder="Usuário">
        <br><br>
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="submit">
        </form>
    </div>
</body>
</html>