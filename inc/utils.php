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
    $query = "SELECT * FROM produtos";
    return mysqli_query($conn, $query);
}
function getProduct($result) {
  return mysqli_fetch_assoc($result);
}

//Adicionar um produto
function addProduct ($conn, $produto, $preco, $quantidade){

    $query = "INSERT INTO produtos
        (
           nome,
           preco,
           quantidade
        )
        VALUES
        (
            '{$produto}',
            {$preco},
            '{$quantidade}'

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
