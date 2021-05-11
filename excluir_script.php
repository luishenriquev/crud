<?php
include 'bootstrap.php';

print_r($_POST);

$id = $_POST['id'];
$nome = $_POST['nome'];


//$sql = "INSERT INTO `pessoas`( `nome`,`endereco`) VALUES
  //       ('$nome','$endereco')";
  $sql = "DELETE FROM `pessoas`  where id = $id ";

$mensagem = '';
if (mysqli_query($conn, $sql)) {
    $mensagem = "$nome excluido com sucesso!";
} else
    $mensagem = "$nome Não foi excluido ";

?>

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

    <div class='container'>
        <div class="row">
            <?=$mensagem?>
            <a href="/" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>