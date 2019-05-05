<?php

// Verificando se o objeto existe
if (isset($paginaEscola)) {
  // Pegando os dados do objeto e setando em variavéis locais
  $id = $paginaEscola->getId();
  $descricao = $paginaEscola->getDescricao();
  $imagem1 = $paginaEscola->getImagem1();


  //Função do onclick para saber qual ação chama o router
  $router = "router('conteudoEscolas', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR CONTEUDO";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('conteudoEscolas', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR CONTEUDO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="txt_area">Texto principal</label>
    <textarea style="margin-bottom:10px;" name="txtDescricao" rows="10" cols="50">
      <?= @$descricao ?>
    </textarea>

    <label for="txt_area">Imagens</label>
    <input type="file" name="file_img1" id="file_img">
    <input type="file" name="file_img2" id="file_img2">
    <input type="file" name="file_img3" id="file_img3">
    <input type="file" name="file_img4" id="file_img4">

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
