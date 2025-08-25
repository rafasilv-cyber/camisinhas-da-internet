<?php
require_once 'classes/Desafio.php';


class DesafioPrivacidade extends Desafio {
    public function __construct() {
        parent::__construct(5, 30);
    }
    
    public function validarResposta($respostas) {
    
        $respostasCorretas = [1, 3, 4];
        $acertos = 0;
        
        foreach ($respostasCorretas as $correta) {
            if (in_array($correta, $respostas)) {
                $acertos++;
            }
        }
        

        return $acertos == count($respostasCorretas) && count($respostas) == count($respostasCorretas);
    }
}

$desafio = new DesafioPrivacidade();
$mensagem = "";
$classeMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respostas = $_POST["opcoes"] ?? [];
    
    if ($desafio->validarResposta($respostas)) {
        $proximaPagina = $desafio->processarAcerto();
        $mensagem = "Parabéns! Você identificou corretamente as práticas que protegem sua privacidade online. Avançando para a página de resultados...";
        $classeMsg = "feedback-success";
        
 
        header("refresh:2;url={$proximaPagina}");
    } else {
        $mensagem = "Resposta incorreta. Revise quais práticas realmente ajudam a proteger sua privacidade online.";
        $classeMsg = "feedback-error";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 5 - Privacidade</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Desafio 5: Privacidade Online</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="desafio">
                <h3>Protegendo sua privacidade</h3>
                <p>Selecione TODAS as práticas que ajudam a proteger sua privacidade online:</p>
                
                <form method="post">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="opcoes[]" value="1">
                            <strong>Opção 1:</strong> Revisar e ajustar as configurações de privacidade nas redes sociais
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="opcoes[]" value="2">
                            <strong>Opção 2:</strong> Compartilhar sua localização em tempo real em todas as aplicações
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="opcoes[]" value="3">
                            <strong>Opção 3:</strong> Utilizar navegação anônima para sites sensíveis
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="opcoes[]" value="4">
                            <strong>Opção 4:</strong> Limpar cookies e histórico de navegação regularmente
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="opcoes[]" value="5">
                            <strong>Opção 5:</strong> Aceitar todos os termos de uso sem ler
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-jogar">Verificar</button>
                </form>
                
                <?php if ($mensagem): ?>
                <div class="feedback <?php echo $classeMsg; ?>">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2025 - Jogo Educativo - Desenvolvimento de Sistemas</p>
        </footer>
    </div>
</body>
</html>