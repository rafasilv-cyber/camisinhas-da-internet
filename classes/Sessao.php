<?php
class Sessao {
    public function __construct() {
        // Inicia a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Inicializa a pontuação e o nível atual se não existirem
        if (!isset($_SESSION['pontuacao'])) {
            $_SESSION['pontuacao'] = 0;
        }
        
        if (!isset($_SESSION['nivel_atual'])) {
            $_SESSION['nivel_atual'] = 1;
        }
    }
    
    // Obtém a pontuação atual
    public function getPontuacao() {
        return $_SESSION['pontuacao'];
    }
    
    // Adiciona pontos à pontuação atual
    public function adicionarPontos($pontos) {
        $_SESSION['pontuacao'] += $pontos;
    }
    
    // Obtém o nível atual
    public function getNivelAtual() {
        return $_SESSION['nivel_atual'];
    }
    
    // Avança para o próximo nível
    public function avancarNivel() {
        $_SESSION['nivel_atual']++;
    }
    
    // Verifica se o jogador pode acessar determinado nível
    public function podeAcessarNivel($nivel) {
        return $nivel <= $_SESSION['nivel_atual'];
    }
    
    // Reinicia o jogo
    public function reiniciarJogo() {
        $_SESSION['pontuacao'] = 0;
        $_SESSION['nivel_atual'] = 1;
    }
}
?>