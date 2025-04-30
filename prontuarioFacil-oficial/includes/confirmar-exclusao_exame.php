<main>

  <h2 class="mt-3">Excluir exame</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o exame <strong><?=$obExame->nome_exame?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="index.php">
        <button type="button" class="btn btn-danger">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-success">Excluir</button>
    </div>

  </form>

</main>