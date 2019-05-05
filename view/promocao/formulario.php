<?php

// Verificando se o objeto existe
if (isset($promocoes)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $idPromocao = $promocoes->getIdPromocao();
  $txtTituloPromocao = $promocoes->getTitulo();
  $txtDescricaoPromocao = $promocoes->getDescricao();
  $rdoCadastro = $promocoes->getPrecisaCadastro();
  $rdoStatus = $promocoes->getStatus();
  $imagem = $promocoes->getImagem();

  //Função do onclick para saber qual ação chama o router
  $router = "router('promocao', 'atualizar', '".$idPromocao."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PROMOÇÃO";

}else{

  //Função do onclick para saber qual ação chama o router
  $router = "router('promocao', 'inserir', 0)";
  
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PROMOÇÃO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txt_">Título da promoção:</label><br>
      <input class="inputEventos font-input" type="text" id="txtTituloPromocao" name="txtTituloPromocao" value="<?= @$txtTituloPromocao?>">
    </div>
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Cadastro necessário?</label><br>
      <div class="cadastro_necessario">
        <input class="radio" type="radio" name="rdoCadastro" value="1" <?php if (@$rdoCadastro == '1') {echo ' checked ';} ?>>Sim

        <input class="radio" type="radio" name="rdoCadastro" value="0" <?php if (@$rdoCadastro == '0') {echo ' checked ';} ?>> Não
      </div>
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos" for="txt_">Descrição:</label>
      <textarea class="inputEventos font-input" type="text" id="txtDescricaoPromocao" name="txtDescricaoPromocao"><?= @$txtDescricaoPromocao?></textarea>
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos">Imagem da Promoção:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>

    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Status</label><br>
      <div class="cadastro_necessario">
        <input class="radio" type="radio" name="rdoStatus" value="1" <?php if ($rdoStatus == '1') {echo ' checked ';} ?>>Ativar

        <input class="radio" type="radio" name="rdoStatus" value="0" <?php if ($rdoStatus == '0') {echo ' checked ';} ?>>Desativar
      </div>
    </div>

    <div class="caixa_inputs_evento titulo_e_localidade">
      
    </div>


    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="promocao();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
