<main>

  <section>
    <a href="javascript:history.back()">
      <button class="btn btn-info">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Nome do Exame</label>
      <input type="text" class="form-control" name="nome_exame" value="<?=$obExame->nome_exame?>">
    </div>
    
    <div class="form-group">
      <label>Resultado</label>
      <input type="text" class="form-control" name="resultado" value="<?=$obExame->resultado?>">
    </div>
    
    <div class="form-group">
      <label>Id do Paciente</label>
      <input type="text" class="form-control" name="id_paciente" value="<?=$obExame->id_paciente?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>