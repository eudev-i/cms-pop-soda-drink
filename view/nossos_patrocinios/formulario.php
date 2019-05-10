<?php

// Verificando se o objeto existe
if (isset($patrocinios)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $idPatrocinio = $patrocinios->getIdPatrocinio();
  $txtNomePatrocinio = $patrocinios->getNome();
  $selectStatus = $patrocinios->getStatus();

  if ($selectStatus == 1) {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "";
  }else {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "SELECTED";
  }
<<<<<<< HEAD

=======
  
>>>>>>> 532366e673ae37a213d0feee6ea43e7610bfc30a
  //Função do onclick para saber qual ação chama o router
  $router = "router('nossosPatrocinios', 'atualizar', '".$idPatrocinio."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PATROCÍNIO";

}else{

  //Função do onclick para saber qual ação chama o router
  $router = "router('nossosPatrocinios', 'inserir', 0)";
<<<<<<< HEAD

=======
  
>>>>>>> 532366e673ae37a213d0feee6ea43e7610bfc30a
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PATROCÍNIO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<<<<<<< HEAD
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div>
=======
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div class="caixa_inputs_evento titulo_e_localidade">
>>>>>>> 532366e673ae37a213d0feee6ea43e7610bfc30a
      <label class="lblEventos" for="txtNomePatrocinio">Patrocínio:</label><br>
      <input class="inputEventos font-input" type="text" id="txtNomePatrocinio" name="txtNomePatrocinio" value="<?= @$txtNomePatrocinio?>">
    </div>

<<<<<<< HEAD
      <div>
      <label class="lblEventos">Imagem do patrocínio:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>

    <div>
      <label>Status</label><br>
      <div class="cadastro_necessario">
        <select name="select_status">
=======
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos">Imagem do patrocínio:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Status</label><br>
      <div class="cadastro_necessario">
        <select name="select_status"> 
>>>>>>> 532366e673ae37a213d0feee6ea43e7610bfc30a
        <option <?= @$selected_ativado_status ?> value="1"> Ativado </option>

        <option <?= @$selected_desativado_status ?> value="0"> Desativado</option>

        </select>
      </div>
    </div>
<<<<<<< HEAD
    
=======
    <div class="caixa_inputs_evento titulo_e_localidade">
      
    </div>
>>>>>>> 532366e673ae37a213d0feee6ea43e7610bfc30a
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
