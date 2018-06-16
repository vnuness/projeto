<?php
class Product {
  //Propriedades
  private $id;
  private $nome;
  private $preco;
  private $quantidade;
  public $categoria;
  public $minEstoque = 50;


  //métodos

  private function formataMoeda($valor)
  {
    return 'R$ ' . number_format($valor, 2, ',', '.');
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setPreco($preco)
  {
    return $this->preco = $preco;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function setQuant($quantidade)
  {
    return $this->quantidade = $quantidade;
  }

  public function getQuant()
  {
    return $this->quantidade;
  }

  public function total()
  {
    $total = $this->preco * $this->quantidade;
    return $this->formataMoeda($total);
  }

  public function statusStok()
  {
    return ($this->quantidade < $this->minEstoque) ? "BAIXO" : "NORMAL";
  }


}
