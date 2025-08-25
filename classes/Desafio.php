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
        
    
        if (!$this->sessao->podeAcessarNivel($nivel)) {
    
            $nivelAtual = $this->sessao->getNivelAtual();
            header("Location: desafio{$nivelAtual}.php");
            exit;
        }
    }
    

    abstract public function validarResposta($resposta);
    

    public function processarAcerto() {
        $this->sessao->adicionarPontos($this->pontosPorAcerto);
        $this->sessao->avancarNivel();
        
   
        $proximoNivel = $this->nivel + 1;
        if ($proximoNivel > 5) {
    
            return "resultado.php";
        } else {
     
            return "desafio{$proximoNivel}.php";
        }
    }
}
?>