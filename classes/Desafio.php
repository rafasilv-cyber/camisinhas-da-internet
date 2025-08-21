<?php
require_once 'Sessao.php';

abstract class Desafio {
    protected $sessao;
    protected $pontosPorAcerto;
    protected $nivel;
    
    public function __construct($nivel, $pontosPorAcerto = 10) {
        $this->sessao = new Sessao();
        $this->nivel = $nivel;
        $this->pontosPorAcerto = $pontosPorAcerto;
        
        // Verifica se o usuário pode acessar este nível
        if (!$this->sessao->podeAcessarNivel($nivel)) {
            // Redireciona para o nível atual do jogador
            $nivelAtual = $this->sessao->getNivelAtual();
            header("Location: desafio{$nivelAtual}.php");
            exit;
        }
    }
    
    // Método abstrato que deve ser implementado por cada desafio específico
    abstract public function validarResposta($resposta);
    
    // Método para processar o acerto
    public function processarAcerto() {
        $this->sessao->adicionarPontos($this->pontosPorAcerto);
        $this->sessao->avancarNivel();
        
        // Determina para onde redirecionar
        $proximoNivel = $this->nivel + 1;
        if ($proximoNivel > 5) {
            // Se for o último desafio, vai para a página de resultados
            return "resultado.php";
        } else {
            // Senão, vai para o próximo desafio
            return "desafio{$proximoNivel}.php";
        }
    }
}
?>