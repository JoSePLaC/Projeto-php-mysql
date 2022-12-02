<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');
        $nome=$_POST['nome'];
        $idade=$_POST['idade'];
        $peso=$_POST['peso'];
        $altura=$_POST['altura'];
        $senha=$_POST['senha'];
        $imc = $peso/($altura**2);

        $result= mysqli_query($conexao, "INSERT INTO clientes(Nome,Idade,Peso,Altura,IMC,Senha)VALUES('$nome','$idade','$peso','$altura', '$imc', '$senha')");
        header('location: index.php');
    
    } else if (isset($_POST['listar'])){
            
            $conexao= mysqli_connect("Localhost", "root", "","cadastro");
            $query= sprintf("SELECT Nome, Idade, Peso, Altura, IMC FROM clientes");
            $dados = mysqli_query($conexao, $query) or die(mysqli_error());
           
            $linha = mysqli_fetch_assoc($dados);
           
            $total = mysqli_num_rows($dados);
            ?><!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lista</title>
                <style>
                    body{
                        background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
                    }
                    .box{
                        color: white;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%,-50%);
                        background-color: rgba(0, 0, 0, 0.8);
                        padding: 15px;
                        border-radius: 15px;
                        width: 20%;
                    }
                    fieldset{
                        border: 3px solid dodgerblue;
                    }
                    legend{
                        border: 1px solid dodgerblue;
                        padding: 10px;
                        text-align: center;
                        background-color: dodgerblue;
                        border-radius: 5px;
                    
                    }
                    .inputbox{
                        position: relative;
                    }
                    .inputUser{
                        background: none;
                        border: none;
                        border-bottom: 1px solid white;
                        outline: none;
                        color: white;
                        font-size: 15px;
                        width: 100%;
                        letter-spacing: 2px;
                    }
                </style>
                <head>
                    <title>Lista</title>
                    <table border="1">
                        <tr>
                            <td>Usuário</td>
                            <td>Idade</td>
                            <td>Altura</td>
                            <td>Peso</td>
                            <td>IMC</td>
                        </tr>
                </head>
                <body>
                <div class="box">
                    <a href="logout.php">LOGOUT</a>
                </div>
                <a href="home.php">Voltar</a>
                <?php
                   
                    if($total > 0) {
                        
                        do {
                ?>         <tr>
                                <td><?=$linha['Nome']?></td>
                                <td><?=$linha['Idade']?></td>
                                <td><?=$linha['Altura']?></td>
                                <td><?=$linha['Peso']?></td>
                                <td><?=$linha['IMC']?></td>
                            </tr>
                <?php
                       
                        }while($linha = mysqli_fetch_assoc($dados));
                   
                    }
                ?>
                </body>
            </html>
                <?php
                
                mysqli_free_result($dados);
            } else {
                ?>
        
                    <!DOCTYPE html>
                    <html lang="pt-br">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Cadastro</title>
                        <style>
                            body{
                                background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
                            }
                            .box{
                                color: white;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%,-50%);
                                background-color: rgba(0, 0, 0, 0.8);
                                padding: 15px;
                                border-radius: 15px;
                                width: 20%;
                            }
                            fieldset{
                                border: 3px solid dodgerblue;
                            }
                            legend{
                                border: 1px solid dodgerblue;
                                padding: 10px;
                                text-align: center;
                                background-color: dodgerblue;
                                border-radius: 5px;
                            
                            }
                            .inputbox{
                                position: relative;
                            }
                            .inputUser{
                                background: none;
                                border: none;
                                border-bottom: 1px solid white;
                                outline: none;
                                color: white;
                                font-size: 15px;
                                width: 100%;
                                letter-spacing: 2px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="box">
                            <form action="cadastro.php" method="POST">
                                <fieldset>
                                    <legend><strong>Formulário de Clientes</strong></legend>
                                    <br> 
                                    <div class="inputbox">
                                        <input type="text" name="nome" id="nome" class="inputUser" required>
                                        <label for="nome">Usuário</label>
                                    </div>
                                    <br><br>
                                    <div class="inputbox">
                                        <input type="password" name="senha" id="senha" class="inputUser" required>
                                        <label for="senha">Senha</label>
                                    </div>
                                    <br><br>
                                    <div class="inputbox">
                                        <input type="number" name="idade" id="idade" class="inputUser" required>
                                        <label for="idade">Idade</label>
                                    </div>
                                    <br><br>
                                    <div class="inputbox">
                                        <input type="number" name="peso" id="peso" class="inputUser" required>
                                        <label for="Peos">Peso</label>
                                    </div>
                                    <br><br>
                                    <div class="inputbox">
                                        <input type="text" name="altura" id="altura" class="inputUser" required>
                                        <label for="altura">Altura</label>
                                    </div>
                                    <br><br>
                                    <button type="submit" id="submit" name="submit">Enviar</button>
                                </fieldset>
                            </form>
                        </div>
                    </body>
                    </html>
<?php
            }