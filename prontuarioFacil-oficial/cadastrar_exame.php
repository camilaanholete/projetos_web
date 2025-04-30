<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Exames');

use \App\Entity\Exame;
$obExame = new Exame;

// Verifica se foi passado o ID do paciente na URL
if(isset($_GET['id'])) {
  // Define o ID do paciente no objeto $obExame
  $obExame->id_paciente = $_GET['id'];
}

//VALIDAÇÃO DO POST
if(isset($_POST['nome_exame'],$_POST['resultado'],$_POST['id_paciente'])){

  $obExame->nome_exame = $_POST['nome_exame'];
  $obExame->resultado = $_POST['resultado'];
  $obExame->id_paciente = $_POST['id_paciente'];
  $obExame->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario_exame.php';
include __DIR__.'/includes/footer.php';