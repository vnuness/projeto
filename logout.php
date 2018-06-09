<?php
include("inc/utils.php");

logout();
redirIfNotLogged();
//include("index.php");
echo '<script type="text/javascript">
  window.location.reload();
</script>';
