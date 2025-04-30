<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Paciente;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A PACIENTE
$obPaciente = Paciente::getPaciente($_GET['id']);

//VALIDAÇÃO DA PACIENTE
if(!$obPaciente instanceof Paciente){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obPaciente->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';