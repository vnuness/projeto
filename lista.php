<?php
include_once("inc/utils.php");
$page = "LISTA";

if($conn = getConn()){
$result = getProducts($conn);
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
   <?php include_once("inc/header.php");?>

    <title>Projeto CRUD - Listagem</title>
  </head>
  <body>

    <?php include ("inc/navbar.php"); ?>
    <br>

    <div class="container">
    <?php include_once("inc/alerts.php");?>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Preco</th>
      <th scope="col">Categoria</th>
      <th scope="col">Acoes</th>
    </tr>
  </thead>
  <tbody>
    <?php while($prod = mysqli_fetch_assoc($result)):  ?>
    <tr>
      <th scope="row"><?=$prod["id"]?></th>
      <td><?=$prod["nome_produto"]?></td>
      <td><?=$prod["quantidade"]?></td>
      <td><?=$prod["preco"]?></td>
      <td><?=$prod["nome_categoria"]?></td>
      <td>
        <!-- <a href="editar.phpx">EdiPrecotar</a> | -->


        <form class="" action="editar.php" method="GET">
          <input type="hidden" name="id" value="<?=$prod["id"]?>">
          <input type="hidden" name="message">
          <button type="submit" class="btn btn-primary">Editar</button>
        </form>

        <!-- <a href="excluir.php?id=?=$prod["id"]?>">Excluir</a> -->

        <form class="" action="excluir.php" method="POST">
          <input type="hidden" name="id" value="<?=$prod["id"]?>">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>

      </td>
    </tr>
<?php endwhile; ?>

  </tbody>
</table>
</div>



  </body>
</html>
