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
  foreach($pacientes as $paciente){
    $resultados .= '<tr>
                      <td>'.$paciente->id.'</td>
                      <td>'.$paciente->nome.'</td>
                      <td>'.$paciente->sobrenome.'</td>
                      <td>'.$paciente->endereco.'</td>
                      <td>'.date('d/m/Y à\s H:i:s',strtotime($paciente->created_at)).'</td>
                      <td>
                        <a href="editar.php?id='.$paciente->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$paciente->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                        <a href="consultar_exames.php?id='.$paciente->id.'">
                          <button type="button" class="btn btn-success">Exames</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum paciente encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo paciente</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Endereço</th>
            <th>Data de criação</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>