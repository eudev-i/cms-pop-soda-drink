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
   ADM. DADOS DO SITE
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
<div id="registros_enquete" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Id</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de enquetes
      require_once "$path_local/cms/controller/controllerPaginaPopsEscolas.php";

      // Instânciando a classe do controler
      $controllerPaginaPopsEscolas = new ControllerPaginaPopsEscolas();

      // Result set que recebe os dados
      $rsConteudo = $controllerPaginaPopsEscolas->listarRegistros();

      if(count($rsConteudo) < 1){
        echo "Nada encontrado";
      }

      foreach ($rsConteudo as $paginaEscolas) {
      ?>
        <tr>
          <td><?= $paginaEscolas->getId() ?></td>
          <td><?= $paginaEscolas->getDescricao() ?></td>
          <td>

          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('conteudoEscolas', 'buscar', <?= $paginaEscolas->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('conteudoEscolas', 'excluir', <?= $paginaEscolas->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php
          }
         ?>
    <tbody>
  </table>
  </div>

    <div class="area_botao centralizarX">
      <a href="#" onclick="form_conteudo_pagina_pops_escolas();">
        <input type="button" name="" value="Novo">
      </a>
    </div>
