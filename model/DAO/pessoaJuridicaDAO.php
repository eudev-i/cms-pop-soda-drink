<?php

/*

Projeto: Pop'Soda Drink
Autor: Arielle
Data Criação: 26/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Setores

*/

class PessoaJuridicaDAO{
  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $conexao;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importanto a classe de conexão com BD
    require_once "$path_local/cms/model/DAO/conexao.php";

    // Instânciando a classe de Conexão
    $this->conexao = new Conexao();

  }

  public function selectAll(){
    $sql = "SELECT * from tbl_pessoa_juridica;";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsUser = $select->fetch(PDO::FETCH_ASSOC)) {
      $user[] = new PessoaJuridica();

      $user[$cont]->setCnpj($rsUser['cnpj']);
      $user[$cont]->setEmail($rsUser['email']);
      $user[$cont]->setNomeFantasia($rsUser['nome_fantasia']);

      $cont += 1;
    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $user;
    }

    public function delete($cnpj)
    {

      // Query de delete
      $sql = "DELETE FROM tbl_pessoa_juridica WHERE cnpj=".$cnpj;

      echo $sql;

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executa o script no BD
      if (!$con->query($sql))
      echo 'Erro no script de delete';

      // Fechando a conexão com BD
      $this->conexao->closeDatabase();

    }

    public function selectById($cnpj){
      $sql = "SELECT pj.*, e.logradouro, e.bairro, e.cidade
	  FROM tbl_pessoa_juridica AS pj
	  INNER JOIN tbl_p_juridica_endereco AS pje ON pj.cnpj = pje.cnpj
	  INNER JOIN tbl_endereco AS e ON pje.id_endereco = e.id_endereco WHERE pj.cnpj = $cnpj;";

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executando o select
      $select = $con->query($sql);

      if($rsUser =  $select->fetch(PDO::FETCH_ASSOC)) {
        $user = new PessoaJuridica();

        $user->setCnpj($rsUser['cnpj']);
        $user->setRazaoSocial($rsUser['razao_social']);
        $user->setNomeFantasia($rsUser['nome_fantasia']);
        $user->setEmail($rsUser['email']);
        $user->setCelular($rsUser['celular']);
        $user->setTelefone($rsUser['telefone']);
        $user->setCidade($rsUser['cidade']);
        $user->setLogradouro($rsUser['logradouro']);
        $user->setFoto($rsUser['foto']);
      }
      //Fechar a conexão com o BD
      $this->conexao->closeDatabase();
      return $user;
    }
  }
