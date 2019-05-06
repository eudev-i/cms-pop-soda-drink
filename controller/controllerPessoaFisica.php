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

  public function inserirRegistro()
  {
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $nome = $_POST['txt_nome'];
      $cpf = $_POST['txt_cpf'];
      $imagem = upload($_FILES['file_img']);
      $email = $_POST['txt_email'];
      $telefone = $_POST['txt_telefone'];
      $celular = $_POST['txt_celular'];
      $usuario = $_POST['txt_usuario'];
      $senha = $_POST['txt_senha'];
      $dtNasc = $_POST['txt_dt_nasc'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $pessoaFisica = new PessoaFisica();

      // Guardando os dodos no objeto Setor
      $pessoaFisica->setNome($nome);
      $pessoaFisica->setCpf($cpf);
      $pessoaFisica->setImagem($imagem);
      $pessoaFisica->setEmail($email);
      $pessoaFisica->setTelefone($telefone);
      $pessoaFisica->setCelular($celular);
      $pessoaFisica->setUsuario($usuario);
      $pessoaFisica->setSenha($senha);
      $pessoaFisica->setDtNasc($dtNasc);
      $pessoaFisica->setStatus($status);

      // Insere o registro no BD
      $this->pessoaFisicaDAO->insert($pessoaFisica);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->pessoaFisicaDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $nome = $_POST['txt_nome'];
      $cpf = $_POST['txt_cpf'];
      $imagem = upload($_FILES['file_img']);
      $email = $_POST['txt_email'];
      $telefone = $_POST['txt_telefone'];
      $celular = $_POST['txt_celular'];
      $usuario = $_POST['txt_usuario'];
      $senha = $_POST['txt_senha'];
      $dtNasc = $_POST['txt_dt_nasc'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $pessoaFisica = new pessoaFisica();

      // Guardando os dodos no objeto Setor
      $pessoaFisica->setNome($nome);
      $pessoaFisica->setCpf($cpf);
      $pessoaFisica->setImagem($imagem);
      $pessoaFisica->setEmail($email);
      $pessoaFisica->setTelefone($telefone);
      $pessoaFisica->setCelular($celular);
      $pessoaFisica->setUsuario($usuario);
      $pessoaFisica->setSenha($senha);
      $pessoaFisica->setDtNasc($dtNasc);
      $pessoaFisica->setStatus($status);

      // Insere o registro no BD
      $this->pessoaFisicaDAO->update($pessoaFisica, $id);

    }

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
