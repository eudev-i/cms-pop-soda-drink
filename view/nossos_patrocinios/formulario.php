<?php

// Verificando se o objeto existe
if (isset($patrocinios)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $idPatrocinio = $patrocinios->getIdPatrocinio();
  $txtNomePatrocinio = $patrocinios->getNome();
  
  //Função do onclick para saber qual ação chama o router
  $router = "router('nossosPatrocinios', 'atualizar', '".$idPatrocinio."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PATROCÍNIO";

}else{

  //Função do onclick para saber qual ação chama o router
  $router = "router('nossosPatrocinios', 'inserir', 0)";
  
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PATROCÍNIO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txtNomePatrocinio">Patrocínio:</label><br>
      <input class="inputEventos font-input" type="text" id="txtNomePatrocinio" name="txtNomePatrocinio" value="<?= @$txtNomePatrocinio?>">
    </div>

    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos">Imagem do patrocínio:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="nossos_patrocinios();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
