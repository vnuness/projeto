<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("inc/header.php");?>
    <title>Projet CRUD</title>
  </head>
  <style>
  .container{
    text-align: center;
  }
  .form-control{
    text-align: center;
  }

  </style>
  <body>
    <div class="container">
      <!--<div class="row">
        <div class="col"></div>
        <div class="col align-self-center">-->
          <h1>Login</h1>
          <form action="login.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1"><b>Email</b></label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="john@doe.com">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"><b>Senha</b></label>
              <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="*****">
            </div>
            <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
          </form>
        <!--</div>
      </div>
    </div>-->
  </body>
</html>
