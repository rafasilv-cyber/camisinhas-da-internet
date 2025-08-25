<?php
require_once 'classes/Desafio.php';


class DesafioSenhasFortes extends Desafio {
    public function __construct() {
        parent::__construct(1, 10);
    }
    
    public function validarResposta($resposta) {

        $temMaiuscula = preg_match('/[A-Z]/', $resposta);
        $temMinuscula = preg_match('/[a-z]/', $resposta);
        $temNumero = preg_match('/[0-9]/', $resposta);
        $temEspecial = preg_match('/[^A-Za-z0-9]/', $resposta);
        $tamanhoMinimo = strlen($resposta) >= 8;
        
        return $temMaiuscula && $temMinuscula && $temNumero && $temEspecial && $tamanhoMinimo;
    }
}

$desafio = new DesafioSenhasFortes();
$mensagem = "";
$classeMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"] ?? "";
    
    if ($desafio->validarResposta($senha)) {
        $proximaPagina = $desafio->processarAcerto();
        $mensagem = "Parabéns! Você criou uma senha forte. Avançando para o próximo desafio...";
        $classeMsg = "feedback-success";
        

        header("refresh:2;url={$proximaPagina}");
    } else {
        $mensagem = "Sua senha não é forte o suficiente. Uma senha forte deve ter pelo menos 8 caracteres, incluir letras maiúsculas, minúsculas, números e caracteres especiais.";
        $classeMsg = "feedback-error";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 1 - Senhas Fortes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Desafio 1: Senhas Fortes</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="desafio">
                <h3>Crie uma senha forte</h3>
                <p>Para proteger suas contas online, você precisa criar uma senha forte. Uma senha forte deve:</p>
                <ul>
                    <li>Ter pelo menos 8 caracteres</li>
                    <li>Incluir pelo menos uma letra maiúscula</li>
                    <li>Incluir pelo menos uma letra minúscula</li>
                    <li>Incluir pelo menos um número</li>
                    <li>Incluir pelo menos um caractere especial (como @, #, $, etc.)</li>
                </ul>
                
                <form method="post">
                    <div class="form-group">
                        <label for="senha">Digite uma senha forte:</label>
                        <input type="text" id="senha" name="senha" required>
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