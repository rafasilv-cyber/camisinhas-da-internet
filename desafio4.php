<?php
require_once 'classes/Desafio.php';

// Classe específica para o Desafio 4 - Autenticação
class DesafioAutenticacao extends Desafio {
    public function __construct() {
        parent::__construct(4, 25); // Nível 4, 25 pontos por acerto
    }
    
    public function validarResposta($resposta) {
        // A resposta correta é a opção 2 (autenticação de dois fatores)
        return $resposta == 2;
    }
}

$desafio = new DesafioAutenticacao();
$mensagem = "";
$classeMsg = "";

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = $_POST["opcao"] ?? 0;
    
    if ($desafio->validarResposta($opcao)) {
        $proximaPagina = $desafio->processarAcerto();
        $mensagem = "Parabéns! Você escolheu o método mais seguro de autenticação. Avançando para o próximo desafio...";
        $classeMsg = "feedback-success";
        
        // Redireciona após 2 segundos
        header("refresh:2;url={$proximaPagina}");
    } else {
        $mensagem = "Resposta incorreta. Considere qual método oferece uma camada adicional de segurança além da senha.";
        $classeMsg = "feedback-error";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 4 - Autenticação</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Desafio 4: Métodos de Autenticação</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="desafio">
                <h3>Escolha o método mais seguro</h3>
                <p>Você está configurando a segurança da sua conta bancária online. Qual dos seguintes métodos de autenticação oferece o maior nível de segurança?</p>
                
                <form method="post">
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="1" required>
                            <strong>Opção 1:</strong> Senha alfanumérica complexa
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="2" required>
                            <strong>Opção 2:</strong> Autenticação de dois fatores (senha + código enviado ao celular)
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="3" required>
                            <strong>Opção 3:</strong> Perguntas de segurança
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="radio" name="opcao" value="4" required>
                            <strong>Opção 4:</strong> PIN numérico de 4 dígitos
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