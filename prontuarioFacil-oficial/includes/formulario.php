<main>

  <section>
    <a href="index.php">
      <button class="btn btn-info">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?=$obPaciente->nome?>">
    </div>
    
    <div class="form-group">
      <label>Sobrenome</label>
      <input type="text" class="form-control" name="sobrenome" value="<?=$obPaciente->sobrenome?>">
    </div>
    
    <div class="form-group">
      <label>Endereço Completo</label>
      <input type="text" class="form-control" name="endereco" value="<?=$obPaciente->endereco?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>