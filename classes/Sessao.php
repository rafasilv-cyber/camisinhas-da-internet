<?php
class Sessao {
    public function __construct() {
  
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
  
        if (!isset($_SESSION['pontuacao'])) {
            $_SESSION['pontuacao'] = 0;
        }
        
        if (!isset($_SESSION['nivel_atual'])) {
            $_SESSION['nivel_atual'] = 1;
        }
    }
    
    public function getPontuacao() {
        return $_SESSION['pontuacao'];
    }
    
    public function adicionarPontos($pontos) {
        $_SESSION['pontuacao'] += $pontos;
    }

    public function getNivelAtual() {
        return $_SESSION['nivel_atual'];
    }
    

    public function avancarNivel() {
        $_SESSION['nivel_atual']++;
    }
    

    public function podeAcessarNivel($nivel) {
        return $nivel <= $_SESSION['nivel_atual'];
    }
    
    public function reiniciarJogo() {
        $_SESSION['pontuacao'] = 0;
        $_SESSION['nivel_atual'] = 1;
    }
}
?>