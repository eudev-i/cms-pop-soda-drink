<?php

// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

// Importando o arquivo de autenticação

require_once "$path_local/cms/verificar_login.php";
//require_once "$path_local/cms/sendEmail.php";
// Variável que recebe o função com o usuário autenticado
$rsUser = verificarAutentica();

$titulo = "CRM - Envio de E-mails";

if(mail("randerson.mendes@openmindbrasil.com.br","Teste","Oi fio","From: randersonvieira1999@gmail.com"))
  echo "Ok";
else
  echo "Error";
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>CMS</title>
  
  <link rel="stylesheet" href="<?= "$path_url/cms/view/css/reset.css" ?>">
  <link rel="stylesheet" href="<?= "$path_url/cms/view/css/style.css" ?>">
  <link rel="stylesheet" href="<?= "$path_url/cms/view/css/css_menu.css" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="<?= "$path_url/cms/view/js/jquery.js" ?>"></script>
  <script src="<?= "$path_url/cms/view/js/ajax.js" ?>"></script>
  <script>

  // Chama função assim que a página é criado
  $(document).ready(function(){

   

  });

  </script>
</head>
<body style="background-color:#E6EAEB">
  <header>
    <div class="titulo centralizarY">
      <div class="logo">
        <img src="<?= "$path_url/cms/view/img/logo_semletras.png" ?>" alt="logo" title="Ir para o site">
      </div>
      POP'SODA DRINK
    </div>

      <div class="logado centralizarY">
        <i class="fas fa-user-circle fa-2x"></i>
        <i class="fas fa-angle-down fa-2px"></i>
    </div>
  </header>
  <div class="content_setor">
    <div class="menu_completo">
      <?php require_once "$path_local/cms/menu.php"; ?>
    </div>
    <div id="caixa_informacoes">
    <div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form_crm" action="#" method="POST">
    <label for="txt_title_email">Título do E-mail</label>
    <input type="text" id="txt_title_email" name="txt_title_email">
    <label for="txt_dest_email">Destinatário</label>
    <input type="text" id="txt_dest_email" name="txt_dest_email">
    <label for="txt_subject">Assunto:</label>
    <input type="text" id="txt_subject" name="txt_subject">
    <label for="txt_descricao">Descrição do E-mail</label>
    <textarea name="txt_descricao" rows="4" required><?= @$descricao ?></textarea>
    
      <div class="area_botao_form">
        <input type="submit" id="btn_submit" name="btn_submit" value="Enviar">
        <input type="reset" value="Limpar">
        
      </div>
    </form>
  </div>
    </div>
  </div>
</body>
</html>
