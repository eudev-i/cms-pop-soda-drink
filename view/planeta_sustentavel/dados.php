<?php

// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

?>

<div class="title_paginas centralizarX">
   Gerenciamento do Planeta Sustentável
</div>
<div class="caixa_filtro centralizarX">
  <div class="caixa_input centralizarX">
    <form action="#">
      <label for="fname">Buscar</label>
      <input type="text" id="fname" name="firstname" placeholder="">
      <input type="submit" value="Filtrar">
    </form>
  </div>
</div>
<div id="registros_adm_sustentavel" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerSustentavel.php";

      // Instânciando a classe do controler
      $controllerSustentavel = new ControllerSustentavel();

      // Result set que recebe os dados
      $rsSustentavel = $controllerSustentavel->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsSustentavel)) {

        ?>
        <tr>
          <td id="descricao"><?= $rsSustentavel[$cont]->getDescricao() ?></td>
          <td id="imagem">
            <img src="<?= "$path_url/cms/view/img/temp/".$rsSustentavel[$cont]->getImagem() ?>" alt="">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('sustentavel', 'buscar', <?= $rsSustentavel[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('sustentavel', 'excluir', <?= $rsSustentavel[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
            <a href="#" onclick="form_fale_conosco();">
              <img src="<?= "$path_url/cms/view/img/ativado.png" ?>" alt="ativado" title="Ativado">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
      <div class="area_botao centralizarX">
        <a href="#" onclick="form_planeta_sustentavel();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
