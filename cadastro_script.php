<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro</title>
  </head>
  <body>
    <div class= "container">
        <div class= "row">
            <?php
              include "connect.php";
              $nome = $_POST['nome'];
              $endereco = $_POST['endereco'];
              $telefone = $_POST['telefone'];
              $email = $_POST['email'];
              $data_nascimento = $_POST['data_nascimento'];
                  //  echo "<pre>";
                  //  print_r($GLOBALS);
                  //  echo "</pre>";
              $sql = "INSERT INTO `pessoa`( `nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";
              if (mysqli_query($conn,$sql)) {
                  mensagem("$nome Cadastrado com sucesso!",'success');
              }
              else {
                  mensagem("$nome Não Cadastrado",'danger');
              }
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

  </body>
</html>
