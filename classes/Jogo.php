<?php
require_once 'Sessao.php';

class Jogo {
    private $sessao;
    private $totalDesafios = 5;
    
    public function __construct() {
        $this->sessao = new Sessao();
    }
    
   
    public function iniciar() {
        $this->sessao->reiniciarJogo();
        header("Location: desafio1.php");
        exit;
    }
    
    
    public function foiConcluido() {
        return $this->sessao->getNivelAtual() > $this->totalDesafios;
    }
    

    public function getPontuacao() {
        return $this->sessao->getPontuacao();
    }
    

    public function getNivelAtual() {
        return $this->sessao->getNivelAtual();
    }
    

    public function getTotalDesafios() {
        return $this->totalDesafios;
    }
}
?>