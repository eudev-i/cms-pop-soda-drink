<?php
  class ControllerVideo{

    // Iniciando a variável em null para não haver erro
    private $path_local;

    // Atributo que será instânciado
    private $setorDAO;

    function __construct()
    {

      // Variável que recebe a variáveil de sessão
      $path_local = $_SESSION['path_local'];

      // Importando a classe Setor
      require_once "$path_local/cms/model/video.php";

        require_once "$path_local/cms/upload.php";

      // Importando a classe SetorDAO
      require_once "$path_local/cms/model/DAO/videoDAO.php";

      // Instânciando a classe SetorDAO
      $this->videoDAO = new VideoDAO();

    }

    public function inserirRegistro(){

      // Verifica qual método está sendo requisitado do formulário (POST ou GET)
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $titulo = $_POST['txt_titulo'];
        $arquivo = upload($_FILES['file_video']);

        // Instânciando a classe Setor
        $video = new Video();

        // Guardando os dodos no objeto Setor
        $video->setTitulo($titulo);
        $video->setArquivo($arquivo);


        // Insere o registro no BD
        $this->videoDAO->insert($video);

      }
    }

    public function listarRegistros(){

      return $this->videoDAO->selectAll();

    }

  }
 ?>
