<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($cargo)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $cargo->getId();
  $nome_cargo = $cargo->getCargo();
  $id_setor = $cargo->getIdSetor();

  //Função do onclick para saber qual ação chama o router
  $router = "router('cargo', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "Atualizar Sobre a POP'S";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('cargo', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "Cadastrar Sobre a POP'S";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST">
    <label for="txt_cargo">Titulo</label>
    <input type="text" id="txt_cargo" name="txt_cargo" value="<?= @$nome_cargo ?>">
    <label>Texto</label>
    <textarea rows="4" cols="50" name="txt_texto" value="<?= @$texto ?>"></textarea>
    <label for="txt_cargo">Imagem</label>
    <input type="file" id="txt_cargo" name="txt_cargo" value="<?= @$nome_cargo ?>">
      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="sobre();">
          <input type="button" value="Cancelar">
        </a>
      </div>
    </form>
  </div>
