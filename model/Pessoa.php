<?php

class ServicePessoa
{

  public function get($busca = null)
  {

    $server = 'localhost';
    $user = 'lh_usuario';
    $pass = '201614Bn';
    $bd = 'lh_empresa';

    if ($conn = new mysqli($server, $user, $pass, $bd)) {
      // echo "conectado!";
    } else {
      echo 'Erro!';
    }

    $sql = "SELECT id, nome, endereco FROM pessoas";
    if ($busca) {
      $sql = "SELECT id, nome, endereco FROM pessoas WHERE nome LIKE '%$busca%'";
    }

    $result = mysqli_query($conn, $sql);

    $pessoas = [];
    while ($coisa = mysqli_fetch_assoc($result)) {
      $pessoas[] = new Pessoa($coisa['id'], $coisa['nome'], $coisa['endereco']);
    }

    return $pessoas;
  }
}

class Pessoa
{
  public $id;
  public $nome;
  public $endereco;

  public function __construct($id, $n, $e)
  {
    $this->id = $id;
    $this->nome = $n;
    $this->endereco = $e;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getRua()
  {
    $arrRua = explode(",", $this->endereco);
    return $arrRua[0];
  }

  public function getNumero()
  {
    $arrRua = explode(",", $this->endereco);
    return isset($arrRua[1]) ? $arrRua[1] : "";
  }
}
