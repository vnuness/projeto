<?php
include_once("inc/utils.php");
$page = "CADASTRO";

$conn = getConn();

if($conn) {
  $categories = getCategories($conn);
}

if($conn && $_POST){
    $added = addProduct($conn, $_POST['produto'],$_POST['preco'],$_POST['quantidade'], $_POST['id_categoria']);
    if($added){
             header("Location: lista.php?action=add&message=success");
    }
    else{
          header("Location: cadastro.php?action=add&message=failed");
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
<div class="container">
<br>
<?php include_once("inc/alerts.php");?>
    <form action="cadastro.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="produto">Produto</label>
                <input type="text" class="form-control" id="produto" name="produto" placeholder="Produto" autofocus>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
              <label for="quantidade">Quantidade</label>
              <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>

            <div class="form-group col-md-6">
                <label for="preco">Preco</label>
                <input type="text" class="form-control" id="preco" name="preco" placeholder="0.00">
            </div>
        </div>

        <?php while( $categ = mysqli_fetch_assoc($categories)):?>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="id_categoria" id="categoria_<?=$categ['id']?>"
            value="<?=$categ['id']?>"/>

            <label class="form-check-label" for="categoria_<?=$categ['id']?>" value="<?=$categ['nome']?>"><?=$categ['nome']?>
            </label>
          </div>
      <?php endwhile;?>


        <br>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>

  </body>
</html>
