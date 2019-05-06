<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 25/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe da  pessoa fisica

*/

class pessoaFisicaDAO
{

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

  // Função que insere um registro no banco
  public function insert(PessoaFisica $pessoaFisica)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_pessoa_fisica(nome, cpf, foto, email, telefone, celular, usuario, senha, status, data_nascimento)
            VALUES(
            '".$pessoaFisica->getNome()."',
            '".$pessoaFisica->getCpf()."',
            '".$pessoaFisica->getImagem()."',
            '".$pessoaFisica->getEmail()."',
            '".$pessoaFisica->getTelefone()."',
            '".$pessoaFisica->getCelular()."',
            '".$pessoaFisica->getUsuario()."',
            '".$pessoaFisica->getSenha()."',
            '".$pessoaFisica->getStatus()."',
            '".$pessoaFisica->getDtNasc()."'
            )";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de insert';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_pessoa_fisica WHERE id_p_fisica=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(PessoaFisica $pessoaFisica, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_pessoa_fisica
            SET nome ='".$pessoaFisica->getNome()."',
                cpf ='".$pessoaFisica->getCpf()."',
                foto ='".$pessoaFisica->getImagem()."',
                email ='".$pessoaFisica->getEmail()."',
                telefone ='".$pessoaFisica->getTelefone()."',
                celular ='".$pessoaFisica->getCelular()."',
                usuario ='".$pessoaFisica->getUsuario()."',
                senha ='".$pessoaFisica->getSenha()."',
                status ='".$pessoaFisica->getStatus()."',
                data_nascimento ='".$pessoaFisica->getDtNasc()."',
            WHERE id_p_fisica=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    if (!$con->query($sql))
    echo 'Erro no script de update';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_pessoa_fisica ORDER BY id_p_fisica DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsPessoaFisica = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do Objeto
      $pessoaFisica[] = new PessoaFisica();

      // Setando os valores do objeto
      $pessoaFisica[$cont]->setId($rsPessoaFisica['id_p_fisica']);
      $pessoaFisica[$cont]->setNome($rsPessoaFisica['nome']);
      $pessoaFisica[$cont]->setCpf($rsPessoaFisica['cpf']);
      $pessoaFisica[$cont]->setImagem($rsPessoaFisica['foto']);
      $pessoaFisica[$cont]->setEmail($rsPessoaFisica['email']);
      $pessoaFisica[$cont]->setTelefone($rsPessoaFisica['telefone']);
      $pessoaFisica[$cont]->setCelular($rsPessoaFisica['celular']);
      $pessoaFisica[$cont]->setUsuario($rsPessoaFisica['usuario']);
      $pessoaFisica[$cont]->setSenha($rsPessoaFisica['senha']);
      $pessoaFisica[$cont]->setStatus($rsPessoaFisica['status']);
      $pessoaFisica[$cont]->setDtNasc($rsPessoaFisica['data_nascimento']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $pessoaFisica;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT pf.*, e.* FROM tbl_pessoa_fisica AS pf
			INNER JOIN tbl_endereco AS e ON e.id_endereco = pf.id_endereco
			WHERE pf.id_p_fisica = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsPessoaFisica = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $pessoaFisica = new PessoaFisica();

      // Setando os valores do objeto
      $pessoaFisica->setId($rsPessoaFisica['id_p_fisica']);
      $pessoaFisica->setNome($rsPessoaFisica['nome']);
      $pessoaFisica->setCpf($rsPessoaFisica['cpf']);
      $pessoaFisica->setImagem($rsPessoaFisica['foto']);
      $pessoaFisica->setEmail($rsPessoaFisica['email']);
      $pessoaFisica->setTelefone($rsPessoaFisica['telefone']);
      $pessoaFisica->setCelular($rsPessoaFisica['celular']);
      $pessoaFisica->setUsuario($rsPessoaFisica['usuario']);
      $pessoaFisica->setSenha($rsPessoaFisica['senha']);
      $pessoaFisica->setStatus($rsPessoaFisica['status']);
      $pessoaFisica->setDtNasc($rsPessoaFisica['data_nascimento']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $pessoaFisica;

  }

}

?>
