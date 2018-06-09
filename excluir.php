  <?php
include_once("inc/utils.php");
redirIfNotLogged();
$conn = getConn();

 if($conn && $_POST){
   if(removeProduct($conn, $_POST['id'])){
     header("Location: lista.php?action=removed&message=success");
   } else{
     header("Location: lista.php?action=removed&message=failed");
   }
 }
