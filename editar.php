<?php
include_once("inc/utils.php");
$page = "EDITAR";

$conn = getConn();

if($conn && $_GET){
    $prod = getProduct(getProductById($conn, $_GET['id']));
    if(!$prod){
      header("Location: lista.php?action=edit&message=failed");
    }
}

if($conn && $_POST){
  $updated = updateProduct($conn, $_POST['id'], $_POST['nome'], $_POST['quantidade'], $_POST['preco']);

  if($updated){
    header("Location: lista.php?action=edit&message=success");
  } else {
    header("Location: lista.php?action=edit&message=failed");
  }
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

    <form action="editar.php" method="POST">
      <input type="hidden" name="id" value="<?=$prod['id']?>">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="produto">Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?=$prod['nome']?>" autofocus>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
              <label for="quantidade">Quantidade</label>
              <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?=$prod['quantidade']?>">
            </div>

            <div class="form-group col-md-6">
                <label for="preco">Preco</label>
                <input type="text" class="form-control" id="preco" name="preco" value="<?=$prod['preco']?>">
            </div>


        </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </body>
</html>
