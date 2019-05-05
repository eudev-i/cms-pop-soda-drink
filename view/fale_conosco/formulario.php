<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];
//Verificando se o objeto existe
if (isset($_GET["id"])) {

  // Importando a controller de setor
  require_once "$path_local/cms/controller/ControllerFaleConosco.php";

  // Instânciando a classe do controler
  $controllerFaleConosco = new ControllerFaleConosco();

  // Result set que recebe os dados
  $rsFaleConosco = $controllerFaleConosco->buscarRegistro();

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $rsFaleConosco->getId();
  $nome = $rsFaleConosco->getNome();
  $email = $rsFaleConosco->getEmail();
  $telefone = $rsFaleConosco->getTelefone();
  $tipo = $rsFaleConosco->getTipo();
  $descricao = $rsFaleConosco->getDescricao();
  $celular = $rsFaleConosco->getCelular();



}

?>

<div class="caixa_form_fale_conosco centralizarX">
  <div id="icon_fechar">
    <a id="#close">
      <img src="img/icon_close.png" alt="icone não encontrado" title="fechar" id="img_icon_fechar">
    </a>
  </div>

  <form id="form" method="POST" action="index.php">
    <label for="txt_cargo">Nome</label>
    <input type="text" id="txt_nome" name="txt_nome" value="<?= @$nome ?>">
    <label for="txt_cargo">Email</label>
    <input type="text" id="txt_cargo" name="txt_email" value="<?= @$email ?>">
    <label for="txt_cargo">Telefone</label>
    <input type="text" id="txt_cargo" name="txt_telefone" value="<?= @$telefone ?>">
    <label for="txt_cargo">Celular</label>
    <input type="text" id="txt_cargo" name="txt_celular" value="<?= @$celular ?>">

    <label for="select_contato">Tipo de contato</label>
    <input type="text" id="txt_cargo" name="txt_celular" value="<?= @$tipo ?>">

    <label for="txt_cargo">Mensagem</label>
    <textarea rows="4" cols="50" name="txt_cargo"><?=@$descricao?></textarea>

  </form>
</div>
