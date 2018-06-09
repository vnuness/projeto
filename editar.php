<?php
include_once("inc/utils.php");
$page = "EDITAR";

$conn = getConn();

if($conn && $_GET) {
  $prod = getProduct( getProductById($conn, $_GET['id']) );
  $categories = getCategories($conn);
  if(!$prod) {
    header("Location: lista.php?action=edit&message=failed");
  }
}

if($conn && $_POST) {
  $updated = updateProduct($conn, $_POST['id'], $_POST['nome'], $_POST['quantidade'], $_POST['preco'], $_POST['categoria']);

  if($updated) {
    header("Location: lista.php?action=edit&message=success");
  } else {
    header("Location: lista.php?action=edit&message=failed");
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once("inc/header.php"); ?>
    <title>Projeto CRUD - Editar</title>
  </head>
  <body>
    <?php include_once("inc/navbar.php"); ?>

    <div class="container">
      <br>
      <?php include_once("inc/alerts.php"); ?>

      <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?=$prod['id']?>">

        <div class="form-row">
          <!-- Produto -->
          <div class="form-group col-md-12">
            <label for="produto">Produto</label>
            <input type="text" name="nome" class="form-control" id="produto" placeholder="Produto" value="<?=$prod['nome']?>">
          </div>
        </div>

        <div class="form-row">
          <!-- Quantidade -->
          <div class="form-group col-md-6">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" class="form-control" id="quantidade" placeholder="Quantidade" value="<?=$prod['quantidade']?>">
          </div>

          <!-- Preço -->
          <div class="form-group col-md-6">
            <label for="preco">Preço R$</label>
            <input type="text" name="preco" class="form-control" id="preco" placeholder="0.00" value="<?=$prod['preco']?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="categoria">Categoria</label>

            <select class="form-control" id="categoria" name="categoria">
              <?php while( $categ = mysqli_fetch_assoc($categories) ): ?>
                <option value="<?=$categ['id']?>"
      <?php if($categ['id'] == $prod['id_categoria']) { echo "selected"; } ?> >

                  <?=$categ['nome']?>
                </option>
              <?php endwhile; ?>
            </select>

          </div>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
    </div>

  </body>
</html>
