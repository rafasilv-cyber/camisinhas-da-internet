<?php
require_once 'classes/Desafio.php';

// Classe específica para o Desafio 2 - Phishing
class DesafioPhishing extends Desafio {
    public function __construct() {
        parent::__construct(2, 15); // Nível 2, 15 pontos por acerto
    }
    
    public function validarResposta($resposta) {
        // A resposta correta é a opção 3 (email suspeito)
        return $resposta == 3;
    }
}

$desafio = new DesafioPhishing();
$mensagem = "";
$classeMsg = "";

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = $_POST["opcao"] ?? 0;
    
    if ($desafio->validarResposta($opcao)) {
        $proximaPagina = $desafio->processarAcerto();
        $mensagem = "Parabéns! Você identificou corretamente o email de phishing. Avançando para o próximo desafio...";
        $classeMsg = "feedback-success";
        
        // Redireciona após 2 segundos
        header("refresh:2;url={$proximaPagina}");
    } else {
        $mensagem = "Resposta incorreta. Analise cuidadosamente os sinais de phishing em cada email.";
        $classeMsg = "feedback-error";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 2 - Phishing</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Desafio 2: Identificando Phishing</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="desafio">
                <h3>Identifique o email de phishing</h3>
                <p>Phishing é uma técnica de fraude online onde criminosos tentam obter informações sensíveis se passando por entidades confiáveis. Analise os emails abaixo e identifique qual deles é uma tentativa de phishing:</p>
                
                <form method="post">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="1" required>
                            <strong>Email 1:</strong> "Olá cliente, sua fatura mensal do cartão está disponível para visualização no aplicativo do banco. Acesse o app ou o site oficial para mais detalhes."
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="2" required>
                            <strong>Email 2:</strong> "Prezado(a), informamos que sua assinatura foi renovada com sucesso. Para verificar os detalhes, acesse sua conta em nosso site oficial."
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="3" required>
                            <strong>Email 3:</strong> "URGENTE: Sua conta bancária foi comprometida! Clique no link a seguir para confirmar seus dados e evitar o bloqueio: www.banco-seguro-verificacao.com"
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="4" required>
                            <strong>Email 4:</strong> "Confirmação de pedido #12345. Seu produto foi enviado e chegará em até 5 dias úteis. Acompanhe pelo código de rastreamento em nosso site."
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