<?php
   
   include('config.php');

   if(isset($_POST['email'])&& isset($_POST['senha'])) {

      if(strlen($_POST['email']) == 0) {
         header('index.php');
      } else if(strlen($_POST['senha']) == 0) {
         header('index.php');
      } else {
  
          $email = $conexao->real_escape_string($_POST['email']);
          $senha = $conexao->real_escape_string($_POST['senha']);
  
          $sql_code = "SELECT * FROM clientes WHERE Nome = '$email' AND senha = '$senha'";
          $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
  
          $quantidade = $sql_query->num_rows;
  
          if($quantidade == 1) {
              
              $usuario = $sql_query->fetch_assoc();
  
              if(!isset($_SESSION)) {
                  session_start();
              }
  
              $_SESSION['id'] = $usuario['id'];
  
              header("Location: sistema.php");
  
          } else {
            ?>
            <!DOCTYPE html>
               <html lang="en">

               <body>
                  <h1>Falha ao logar! E-mail ou senha incorretos</h1<!DOCTYPE html>
                  <div class="box">
                     <a href="index.php">Voltar</a>
                  </div>
               <html lang="pt-br">
               <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>ERROR</title>
                  <style>
                     body{
                           font-family: Arial, Helvetica, sans-serif;
                           background: linear-gradient(to right,rgb(20,147,220), rgb(17,54,71));
                           text-align: center;
                           color: white;

                     }
                     .box{
                           position: absolute;
                           top: 50%;
                           left: 50%;
                           transform: translate(-50%,-50%);
                           background-color: rgba(0, 0, 0, 0.8);
                           padding: 30px;
                           border-radius: 15px;
                     }
                     {
                           text-decoration: none;
                           color: white;
                           border: 3px solid dodgerblue;
                           border-radius: 10px;
                           padding: 10px;
                     }
                  </style>
               </head>
                     
               </html>
            <?php

            echo 'Dados inválidos';
          }
  
      }
  
  } 

?>