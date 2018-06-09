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
              p.quantidade,
              c.nome AS nome_categoria
            FROM
              produtos AS p
            INNER JOIN
              categorias AS c
            ON
              (p.id_categoria = c.id)";
  return mysqli_query($conn, $query);
}

function getProduct($result) {
  return mysqli_fetch_assoc($result);
}

function addProduct($conn, $nome, $preco, $quant, $idcateg) {
  $query = "INSERT INTO produtos
              ( nome, preco, quantidade, id_categoria )
            VALUteste@tES
              ( '{$nome}', {$preco}, '{$quanti}', '{$idcateg}' )";

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
              quantidade = '{$quant}',
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
  $query = "SELECT * FROM categorias ORDER BY nome";
  return mysqli_query($conn, $query);
}

function getUser($conn, $email, $senha)
{
  $query = "SELECT
              id, nome, email
            FROM
              usuarios
            WHERE
              email = '{$email}'
            AND
              senha = '{$senha}'";
  return mysqli_query($conn, $query);
}

function redirIfNotLogged()
{
  if(!isset($_COOKIE["USER_LOGGED"]))
  {
    header("Location: index.php?r=no_auth");
  }
}
