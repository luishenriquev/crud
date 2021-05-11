<?php

require "bootstrap.php";

$busca = $_POST['busca'] ?? '';

$service = new ServicePessoa();
$pessoas = $service->get($busca);

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
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisar.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Rua</th>
                            <th scope="col">Número</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pessoas as $p) : ?>
                            <tr>
                                <th scope='row'><?= $p->nome ?></th>
                                <td><?= $p->getRua() ?></td>
                                <td><?= $p->getNumero() ?></td>
                                <td width=140px>
                                    <a href='cadastro_edit.php?id=<?= $p->id ?>' class='btn btn-success btn-sm'>Editar</a>
                                    <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick="pegar_dados(<?= $p->id ?>, '<?= $p->nome ?>')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="/" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
                </div>
                <div class="modal-footer">
                    <form action="excluir_script.php" method="POST">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <input type="hidden" name="id" id="cod_pessoa" value="">
                        <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value = id;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>