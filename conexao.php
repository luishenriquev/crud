<?php
$server = 'localhost';
$user = 'lh_usuario';
$pass = '';
$bd = 'lh_empresa';

if ($conn = new mysqli($server, $user, $pass, $bd)) {
    // echo "conectado!";
} else {
    echo 'Erro!';
}
