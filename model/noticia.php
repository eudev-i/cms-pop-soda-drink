<?php

    class Noticia{

        private $idNoticia;
        private $titulo;
        private $imagem;
        private $dataNoticia;
        private $descricao;
        private $status;


        public function getIdNoticia(){
            return $this->idNoticia;
          }
        
          public function setIdNoticia($idNoticia){
            $this->idNoticia = $idNoticia;
          }
        
          public function getTitulo(){
            return $this->titulo;
          }
        
          public function setTitulo($titulo){
            $this->titulo = $titulo;
          }
        
          public function getImagem(){
            return $this->imagem;
          }
        
          public function setImagem($imagem){
            $this->imagem = $imagem;
          }
        
          public function getDataNoticia(){
            return $this->dataNoticia;
          }
        
          public function setDataNoticia($dataNoticia){
            if(strpos($dataNoticia, "/")){
                //Tratamento da data para enviar para o banco
                $this->dataNoticia = date("Y-m-d", strtotime($dataNoticia));
            }else if(strpos($dataNoticia, "-")){
                    $this->dataNoticia = date("d/m/Y", strtotime($dataNoticia));
            }
          }
        
          public function getDescricao(){
            return $this->descricao;
          }
        
          public function setDescricao($descricao){
            $this->descricao = $descricao;
          }
        
          public function getStatus(){
            return $this->status;
          }
        
          public function setStatus($status){
            $this->status = $status;
          }

    }

?>