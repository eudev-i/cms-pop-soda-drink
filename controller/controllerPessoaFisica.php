<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Vitoria
  Data Criação: 25/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller da Pessoa fisica

 */

class ControllerPessoaFisica
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $pessoaFisicaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    $path_url = $_SESSION['path_url'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/pessoaFisica.php";

	  require_once "$path_local/cms/upload.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/pessoaFisicaDAO.php";

    // Instânciando a classe SetorDAO
    $this->pessoaFisicaDAO = new pessoaFisicaDAO();

  }

 

  public function listarRegistros()
  {

    return $this->pessoaFisicaDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->pessoaFisicaDAO->selectById($id);

  }

}

 ?>
