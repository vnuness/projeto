<?php
function navActive($pg, $key) {
  if($pg == $key) {
    return "active";
  }
}
function getConn() {
  $host = "127.0.0.1";
  $user = "root";
  $pass = "";
  $db   = "fp_73";
  return mysqli_connect($host, $user, $pass, $db);
}
function getProductById($conn, $id) {
  $query = "SELECT * FROM produtos WHERE id={$id}";
  return mysqli_query($conn, $query);
}
function getProducts($conn) {
  $query = "SELECT
              p.id,
              p.nome AS nome_produto,
              p.preco,
              p.quant,
              c.nome AS nome_categoria
            FROM
              produtos AS p
            INNER JOIN
              categorias AS c
            ON
              (p.id_categoria = c.id)
            ORDER BY
              p.id
            ASC";
  return mysqli_query($conn, $query);
}
function getProduct($result) {
  return mysqli_fetch_assoc($result);
}
function addProduct($conn, $nome, $preco, $quant, $idcateg) {
  $query = "INSERT INTO produtos
              ( nome, preco, quant, id_categoria )
            VALUES
              ( '{$nome}', {$preco}, '{$quant}', '{$idcateg}' )";

  return mysqli_query($conn, $query);
}
function removeProduct($conn, $id) {
  if($id && is_numeric($id)) {
    $query = "DELETE FROM produtos WHERE id={$id}";
    return mysqli_query($conn, $query);
  }
  return false;
}
function updateProduct($conn, $id, $nome, $quant, $preco, $idCategoria) {
  if($id && is_numeric($id)) {
    $query = "UPDATE
              produtos
            SET
              nome = '{$nome}',
              quant = '{$quant}',
              preco = '{$preco}',
              id_categoria = '{$idCategoria}'
            WHERE
              id = '{$id}'
            ";
    return mysqli_query($conn, $query);
  }
  return false;
}
function getCategories($conn) {
  $query = "SELECT * FROM categorias ORDER BY nome ASC";
  return mysqli_query($conn, $query);
}
function getUser($conn, $email, $senha) {
  $query = "SELECT
              id, nome, email
            FROM
              usuarios
            WHERE
              email = '{$email}'
            AND
              senha = md5('{$senha}')
            ";
  return mysqli_query($conn, $query);
}
function redirIfNotLogged() {
  session_start();
  if( !(isset($_SESSION["AUTH"]) && $_SESSION["AUTH"] == true) ) {
    header("Location: index.php?r=no_auth");
  }
}
function logout() {
  session_start();
  if( isset($_SESSION["AUTH"]) && $_SESSION["AUTH"] == true ) {
    session_destroy();
  }
}
