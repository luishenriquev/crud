<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Alteração de cadastro</title>
  </head>
  <body>
   <?php
    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas where id = $id";

    $dados = $conn->query($sql);
   $linha = mysqli_fetch_assoc($dados);

   
   ?>
 


 <div class='container'>
     <div class="row">
         <div class="col">
            <h1>cadastro</h1>
            <form action="edit_script.php" method="POST">
              <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" name='nome'Required  value="<?php echo $linha['nome'];?>">
              </div>
              <div class="form-group">
                <label for="endereço">Endereço</label>
                <input type="text" class="form-control" name='endereco' value="<?php echo $linha['endereco'];?>">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success" value="Salvar alterações" >
                <input type="hidden" name="id" value="<?php echo $linha['id'];?>">
              </div>
            </form>
            <a href="index.html" class="btn btn-info">Voltar</a>
         </div>
     </div>
 </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>