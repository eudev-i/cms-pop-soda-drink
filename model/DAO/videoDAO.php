<?php

class VideoDAO
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
  public function insert(Video $video)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_video(titulo, caminho, status)  VALUES('".$video->getTitulo()."', '".$video->getArquivo()."', 1)";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de insert';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_video WHERE status = 1";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsVideos = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $videos[] = new Video();

      // Setando os valores do objeto
      $videos[$cont]->setId($rsVideos['id_video']);
      $videos[$cont]->setTitulo($rsVideos['titulo']);


      $cont += 1;

    }
  }
}

 ?>
