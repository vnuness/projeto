<?php

if($_POST)
{
  include("inc/utils.php");
  $conn = getConn();
  if($conn)
  {
    $result = getUser($conn, $_POST['email'], $_POST['senha']);

     if($result->num_rows == 1){
     echo "ACESSO PERMITIDO";
     $user = mysqli_fetch_object($result);
     setcookie("USER_LOGGED", $user->email);
     header("Location: lista.php");
} else {
     header("Location: index.php?r=user_not_found");
}
  } else
  {
    header("Location: index.php?r=without_conn");
  }
} else
{
  header("Location: index.php?r=without_post");
}
