<?php
include_once("inc/utils.php");
$page = "CADASTRO";

$conn = getConn();

if($conn && $_POST)
  if(addProduct($conn, $_POST['produto'],$_POST['preco'],$_POST['quantidade'])){
           header("Location: lista.php?action=add&message=success");
  }
  else{
        header("Location: cadastro.php?action=add&message=failed");
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

    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>

  </body>
</html>
