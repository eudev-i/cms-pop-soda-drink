<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Arielle
  Data Criação: 26/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de usuario que são pessoa Juridica

 */

class ControllerPessoaJurica{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $paginaEscolaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/pessoaJuridica.php";

    require_once "$path_local/cms/upload.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/PessoaJuridicaDAO.php";

    // Instânciando a classe SetorDAO
    $this->pessoaJuridicaDAO = new PessoaJuridicaDAO();

  }

  public function listarRegistros(){

    return $this->pessoaJuridicaDAO->selectAll();

  }

  public function excluirRegistro(){
    $cnpj = $_GET['id'];

    $this->pessoaJuridicaDAO->delete($cnpj);
  }

  public function buscarRegistro()
  {

    $cnpj = $_GET['id'];

    return $this->pessoaJuridicaDAO->selectById($cnpj);

  }

  public function updateStatus(){
      $cnpj = $_GET['id'];
      $idElement = $_GET['status'];

      echo "<script>console.log('Ok 2 mano');</script>";
      echo "<script>console.log($cnpj);</script>";
      echo "<script>console.log($idElement);</script>";

      $this->pessoaJuridicaDAO->updateStatus($cnpj, $idElement);

  }
}
 ?>
