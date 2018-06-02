<?php
//NavBar
function navActive($pg, $key){
    if($pg==$key){
        return "active";
    }
}

//Conexao com banco
function getConn(){
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'loja';

return mysqli_connect($host, $username, $passwd, $dbname);
}

function getProductById($conn, $id){
  $query = "SELECT * FROM produtos WHERE id={$id}";
  return mysqli_query($conn, $query);
}

//Seleciona todos os produtos
function getProducts($conn){
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

//Adicionar um produto
function addProduct ($conn, $produto, $preco, $quantidade, $id_categoria){

    $query = "INSERT INTO produtos
        (
           nome,
           preco,
           quantidade,
           id_categoria
        )
        VALUES
        (
            '{$produto}',
            {$preco},
            '{$quantidade}',
            {$id_categoria}

        )";
        return mysqli_query($conn, $query);


}

function removeProduct($conn, $id){
  $query = "DELETE FROM produtos WHERE id='{$id}'";

  return mysqli_query($conn, $query);
}

function updateProduct($conn, $id, $nome, $quantidade, $preco){
  if($id && is_numeric($id)) {
    $query = "UPDATE
                produtos
              SET
                nome = '{$nome}',
                quantidade = '{$quantidade}',
                preco = '{$preco}'
              WHERE
                id = '{$_POST['id']}'
              ";
    return mysqli_query($conn, $query);
  }
}

function getCategories($conn){
  $query = "SELECT * FROM categorias";
  return mysqli_query($conn, $query);
}
