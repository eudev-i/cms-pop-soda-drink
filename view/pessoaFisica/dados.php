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
   Gerenciamento da pessoa física
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
        <th>Nome</th>
        <th>Email</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerPessoaFisica.php";

      // Instânciando a classe do controler
      $controllerPessoaFisica = new ControllerPessoaFisica();

      // Result set que recebe os dados
      $rsPessoaFisica = $controllerPessoaFisica->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsPessoaFisica)) {

        ?>
        <tr>
          <td id="descricao"><?= $rsPessoaFisica[$cont]->getNome() ?></td>
          <td id="descricao"><?= $rsPessoaFisica[$cont]->getEmail() ?></td>
          <td id="td_imagens">



            <a class="visualizar_pessoaFisica" onclick="visualizar_pessoaFisica( <?= $rsPessoaFisica[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/vizualizar.png" ?>" alt="Visualizar" title="Visualizar">
            </a>

            <a href="#" onclick="router('pessoafisica', 'excluir', <?= $rsPessoaFisica[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>

          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
