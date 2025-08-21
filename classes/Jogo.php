<?php
require_once 'Sessao.php';

class Jogo {
    private $sessao;
    private $totalDesafios = 5;
    
    public function __construct() {
        $this->sessao = new Sessao();
    }
    
    // Inicia um novo jogo
    public function iniciar() {
        $this->sessao->reiniciarJogo();
        header("Location: desafio1.php");
        exit;
    }
    
    // Verifica se o jogo foi concluído
    public function foiConcluido() {
        return $this->sessao->getNivelAtual() > $this->totalDesafios;
    }
    
    // Obtém a pontuação atual
    public function getPontuacao() {
        return $this->sessao->getPontuacao();
    }
    
    // Obtém o nível atual
    public function getNivelAtual() {
        return $this->sessao->getNivelAtual();
    }
    
    // Obtém o total de desafios
    public function getTotalDesafios() {
        return $this->totalDesafios;
    }
}
?>