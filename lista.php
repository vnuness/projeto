<?php
include_once("inc/utils.php");
//redirIfNotLogged();
$page = "LISTA";

if($conn = getConn()) {
  $produtos = getProducts($conn);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once("inc/header.php"); ?>
    <title>Projeto CRUD - Listagem</title>
  </head>
  <body>
    <?php include_once("inc/navbar.php"); ?>

    <div class="container">
      <br>
      <?php include_once("inc/alerts.php"); ?>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto){ ?>
          <tr>
            <th scope="row"><?= $produto->id ?></th>
            <td><?= $produto->nome ?></td>
            <td><?= $produto->quantidade ?></td>
            <td><?= $produto->preco ?></td>
            <td><?= $produto->nome_categoria ?></td>
            <td>
              <!-- <a href="editar.php">Editar</a> |  -->

              <form action="editar.php" method="GET">
                <input type="hidden" name="id" value="<?= $produto->id ?>">
                <input type="hidden" name="message">
                <button type="submit" class="btn btn-primary">Editar</button>
              </form>



              <form action="excluir.php" method="POST">
                <input type="hidden" name="id" value="<?= $produto->id ?>">
                <button type="submit" class="btn btn-danger">Excluir</button>
              </form>

            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
