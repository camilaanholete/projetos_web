<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar exame');

use \App\Entity\Exame;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A PACIENTE
$obExame = Exame::getExameUnico($_GET['id']);

//VALIDAÇÃO DA PACIENTE
if(!$obExame instanceof Exame){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['nome_exame'],$_POST['resultado'],$_POST['id_paciente'])){

  $obExame->nome_exame    = $_POST['nome_exame'];
  $obExame->resultado = $_POST['resultado'];
  $obExame->id_paciente     = $_POST['id_paciente'];
  $obExame->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario_exame.php';
include __DIR__.'/includes/footer.php';