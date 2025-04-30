<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($exames as $exame){
    $resultados .= '<tr>
                      <td>'.$exame->id.'</td>
                      <td>'.$exame->nome_exame.'</td>
                      <td>'.$exame->resultado.'</td>
                      <td>'.date('d/m/Y à\s H:i:s',strtotime($exame->data)).'</td>
                      <td>
                        <a href="editar_exame.php?id='.$exame->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir_exame.php?id='.$exame->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="5" class="text-center">
                                                              Nenhum exame encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
  
    <a href="index.php">
      <button class="btn btn-info">Voltar</button>
    </a>
    <?php if (!empty($exame->id_paciente)): ?>
      <a href="cadastrar_exame.php?id=<?=$exame->id_paciente?>">
        <button class="btn btn-success">Novo exame</button>
      </a>
    <?php endif; ?>
    <?php if (empty($exame->id_paciente) && $_GET['id']): ?>
      <a href="cadastrar_exame.php?id=<?=$_GET['id']?>">
        <button class="btn btn-success">Novo exame</button>
      </a>
    <?php endif; ?>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Exame</th>
            <th>Resultado</th>
            <th>Data de cadastro</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>