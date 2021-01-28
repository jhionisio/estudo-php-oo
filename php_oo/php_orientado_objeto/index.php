<?php

require __DIR__ . '/vendor/autoload.php';

use App\Helpers\Util;
use Config\SiteInfo;


interface IUsuario
{
  public function alteraSenha($senha);
  public function getNome();
  public function getTelefone();
}


abstract class Usuario implements IUsuario
{
  public $id;
  public $nome;
  public $email;
  protected $senha;
  public $telefone;

  public function alteraSenha($senha)
  {
    $this->senha = md5($senha);
  }
  public function getTelefone()
  {
    return $this->telefone;
  }

  abstract public function getNome();

}


class Admin extends Usuario implements IUsuario
{
  public function setSenha($senha)
  {
    $senha = $senha.$this->email;
    parent::alteraSenha($senha);
  }
  public function getSenha()
  {
    return $this->senha;
  }
  public function getNome()
  {
    return $this->nome;
  }
}
class Gerente extends Usuario implements IUsuario
{
  public function getNome()
  {
    return $this->nome;
  }
}

class Vendedor extends Usuario implements IUsuario
{
  public function getNome()
  {
    return $this->nome;
  }
}


class Cliente extends Usuario implements IUsuario
{

  public $assinante;

  public function exibeNome()
  {
    return 'Nome: '.$this->nome;
  }
  public function getNome()
  {
    return $this->nome;
  }


}

class Assinatura
{
  private $id;
  private $id_cliente;
  private $titulo;
  private $valor;

  public function __construct($id = null,$id_cliente = null,$titulo = null,$valor = null)
  {
    $this->id = $id;
    $this->id_cliente = $id_cliente;
    $this->titulo = $titulo;
    $this->valor = $valor;
  }

  public function exibeAssinatura()
  {
    $html = "<p>";
    $html .= "<b>Id: </b>$this->id";
    $html .= "</p>";

    $html .= "<p>";
    $html .= "<b>Id do Cliente: </b>".$this->id_cliente;
    $html .= "</p>";

    $html .= "<p>";
    $html .= "<b>Título: </b>".$this->titulo;
    $html .= "</p>";

    $html .= "<p>";
    //$html .= "<b>Valor: </b>".$this->trataValor($this->valor);
    $html .= "<b>Valor: </b>".Util::trataValor($this->valor);
    $html .= "</p>";
    echo $html;
  }

  private function trataValor($valor)
  {
    return "R$ ".number_format($valor,2,',','.');
  }



  public function setId($valor)
  {
    $this->id = $valor;
  }
  public function getId()
  {
    return $this->id;
  }

  public function setId_cliente($valor)
  {
    $this->id_cliente = $valor;
  }
  public function getId_cliente()
  {
    return $this->id_cliente;
  }

  public function setTitulo($valor)
  {
    $this->titulo = $valor;
  }
  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setValor($valor)
  {
    $this->valor = $valor;
  }
  public function getValor()
  {
    return $this->valor;
  }

}



$maria = new Cliente();
$maria->id = 1;
$maria->nome = "Maria";
$maria->email = "maria@gmail.com";
//$maria->senha = "666999696969";
$maria->alteraSenha('666999696969');
$maria->telefone = "984567233";
$maria->assinante = true;

$assinaturaMaria = new Assinatura(1,$maria->id,"Ass. Vip",95.90);

$murilo = new Admin();
$murilo->id = 1;
$murilo->nome = "Murilo";
$murilo->email = "murilo@gmail.com";
$murilo->telefone = "245343554";
$murilo->setSenha('66999966');
echo "senha: ".$murilo->getSenha();

var_dump($murilo);

$assinaturaMaria->exibeAssinatura();

$gustavo = new Vendedor();
$gustavo->id = 1;
$gustavo->nome = "Gustavo";
$gustavo->email = "gustavo@gail.com";
$gustavo->telefone = "76448769";
$gustavo->alteraSenha('696969696969');

echo 'Nome do site:'.SiteInfo::$nome;
echo '<br>';
echo 'Descrição do site:'.SiteInfo::$descricao;
