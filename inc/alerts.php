<?php if($_GET && $_GET['message'] == 'failed'):?>
<div class="alert alert-danger" role="alert">
<?php if($_GET['action'] == 'add'){
  print "Ocorreu um erro ao cadastrar o produto!";
}

if($_GET['action'] == 'removed'){
  print "Ocorreu um erro ao excluir o produto!";
}

if($_GET['action'] == 'edit'){
  print "Ocorreu um erro ao editar o produto!";
}

?>



</div>
<?php endif; ?>
<br>

<?php if($_GET && $_GET['message'] == 'success'):?>
    <div class="alert alert-success" role="alert">
      <?php
      if($_GET['action'] == 'add'){
        print "Produto cadastrado com sucesso!";
      }

      if($_GET['action'] == 'removed'){
        print "Produto excluido com sucesso!";
      }

      if($_GET['action'] == 'edit') {
        print "Produto editado com sucesso!";
      }
      ?>

    </div>
<?php endif; ?>
<br>

<?php if($_GET && $_GET['message'] == 'danger'):?>
    <div class="alert alert-danger" role="alert">
    Produto nao cadastrado!
    </div>
<?php endif; ?>
<br>
