<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Exame;

$exames = Exame::getExame($_GET['id']);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem_exames.php';
include __DIR__.'/includes/footer.php';