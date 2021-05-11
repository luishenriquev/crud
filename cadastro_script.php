<?php
include 'conexao.php';

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];

$sql = "INSERT INTO `pessoas`( `nome`,`endereco`) VALUES
         ('$nome','$endereco')";

$mensagem = '';
if (mysqli_query($conn, $sql)) {
    $mensagem = mensagem("$nome cadastrado com sucesso!", 'success');
} else
    $mensagem = mensagem("$nome Não foi cadastrado", 'danger');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>cadastro</title>
</head>

<body>

    <div class='container'>
        <div class="row">
            <?=$mensagem?>
            <a href="index.html" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>