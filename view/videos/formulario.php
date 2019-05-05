<?php

// Verificando se o objeto existe
if (isset($video)) {

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR VÍDEO";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('videos', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR VÍDEO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="txt_area">Titulo do vídeo</label>
    <input type="text" name="txt_titulo" value="">

    <label for="txt_area">Arquivo de vídeo</label>
    <input type="file" name="file_video" id="file_video">

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="conteudo_pops_nas_escolas();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
