<?php
/*

Projeto: Pop'Soda Drink
Autor: Arielle
Data Criação: 26/04/2019

Objetivo da Classe: Classe de pessoa jurica

*/

  class PessoaJuridica{
    private $cnpj;
    private $foto;
    private $email;
    private $telefone;
    private $celular;
    private $usuario;
    private $senha;
    private $status;
    private $razao_social;
    private $nome_fantansia;
    private $cidade;
    private $logradouro;


  function __construct()
  {
    // code...
  }

  public function getCnpj(){
    return $this->cnpj;
  }

  public function setCnpj($cnpj){
    $this->cnpj = $cnpj;
  }

  public function getFoto(){
    return $this->foto;
  }

  public function setFoto($foto){
     $this->foto = $foto;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
     $this->telefone =  $telefone;
  }

  public function getCelular(){
    return $this->celular;
  }

  public function setCelular($celular){
    $this->celular = $celular;
  }

  public function getUsuario(){
    return $this->usuario;
  }

  public function setUsuario($usuario){
     $this->usuario = $usuario;
  }

  public function getSenha(){
    return $this->senha;
  }

  public function setSenha($senha){
     $this->senha = $senha;
  }

  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
   $this->status = $status;
  }

  public function getRazaoSocial(){
    return $this->razao_social;
  }

  public function setRazaoSocial($razao_social){
   $this->razao_social = $razao_social;
  }

  public function getNomeFantasia(){
    return $this->nome_fantasia;
  }

  public function setNomeFantasia($nome_fantasia){
    $this->nome_fantasia = $nome_fantasia;
  }

  public function getCidade(){
    return $this->cidade;
  }

  public function setCidade($cidade){
    $this->cidade = $cidade;
  }

  public function getLogradouro(){
    return $this->logradouro;
  }

  public function setLogradouro($logradouro){
    $this->logradouro = $logradouro;
  }
}




 ?>
