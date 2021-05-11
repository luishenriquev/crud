<?php
$server ="localhost";
$user ="lh_usuario";
$pass ="201614Bn";
$bd = "lh_empresa";


if ( $conn = new mysqli($server, $user, $pass, $bd)){
   // echo "conectado!";
} else 
   echo "Erro!";


function mensagem($texto, $tipo){
    return "<div class='alert alert-$tipo' role ='alert'>
    $texto
    </div>";
}


?>