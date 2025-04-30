<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Paciente');

//use \App\Entity\Exame;
//$obExame = new Exame;

use \App\Entity\Paciente;
$obPaciente = new Paciente;

//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['sobrenome'],$_POST['endereco'])){

  $obPaciente->nome    = $_POST['nome'];
  $obPaciente->sobrenome = $_POST['sobrenome'];
  $obPaciente->endereco     = $_POST['endereco'];
  $obPaciente->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';