<?php

// Verificando se o objeto existe
if (isset($eventos)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $idEventos = $eventos->getIdEventos();
  $txtTituloEvento = $eventos->getTitulo();
  $txtDescricaoEvento = $eventos->getDescricao();
  $txtLocalidadeEvento = $eventos->getLocalidade();
  $txtDataEvento = $eventos->getDataEvento();
  $status = $eventos->getStatus();

  //Função do onclick para saber qual ação chama o router
  $router = "router('eventos', 'atualizar', '".$idEventos."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR EVENTO";

}else{

  //Função do onclick para saber qual ação chama o router
  $router = "router('eventos', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR EVENTOS";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST">
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txtTituloEvento">Título do evento:</label><br>
      <input class="inputEventos font-input" type="text" id="txtTituloEvento" name="txtTituloEvento" value="<?= @$txtTituloEvento?>">
    </div>
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txtLocalidadeEvento">Localidade:</label>
      <input class="inputEventos font-input" type="text" id="txtLocalidadeEvento" name="txtLocalidadeEvento" value="<?= @$txtLocalidadeEvento?>">
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos" for="txtDescricaoEvento">Descrição:</label>
      <textarea class="inputEventos font-input" type="text" id="txtDescricaoEvento" name="txtDescricaoEvento"><?= @$txtDescricaoEvento?></textarea>
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos" for="txtDataEvento">Data:</label><br>
      <input class="inputEventos font-input largura_data" maxlength="10" type="text" id="txtDataEvento" name="txtDataEvento" value="<?= @$txtDataEvento?>"><br>
      <label class="lblEventos">Status:</label><br>
      <select name="select_status">
        <option value="1" <?php if (@$status == 1) echo 'selected="selected"';?>>Ativado</option>
        <option value="0" <?php if (@$status == 0) echo 'selected="selected"';?>>Desativado</option>
      </select>
    </div>
    

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="eventos();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
