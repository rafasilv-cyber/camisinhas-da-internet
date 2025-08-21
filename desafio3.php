<?php
require_once 'classes/Desafio.php';

// Classe específica para o Desafio 3 - Backup
class DesafioBackup extends Desafio {
    public function __construct() {
        parent::__construct(3, 20); // Nível 3, 20 pontos por acerto
    }
    
    public function validarResposta($resposta) {
        // Converte a resposta para minúsculas e remove espaços extras
        $resposta = strtolower(trim($resposta));
        
        // Verifica se a resposta contém as palavras-chave corretas
        $palavrasChave = ['nuvem', 'disco externo', 'hd externo', 'pendrive'];
        
        foreach ($palavrasChave as $palavra) {
            if (strpos($resposta, $palavra) !== false) {
                return true;
            }
        }
        
        return false;
    }
}

$desafio = new DesafioBackup();
$mensagem = "";
$classeMsg = "";

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resposta = $_POST["resposta"] ?? "";
    
    if ($desafio->validarResposta($resposta)) {
        $proximaPagina = $desafio->processarAcerto();
        $mensagem = "Parabéns! Você identificou corretamente um local seguro para backup. Avançando para o próximo desafio...";
        $classeMsg = "feedback-success";
        
        // Redireciona após 2 segundos
        header("refresh:2;url={$proximaPagina}");
    } else {
        $mensagem = "Resposta incorreta. Pense em locais externos ao seu computador onde você poderia armazenar cópias dos seus arquivos importantes.";
        $classeMsg = "feedback-error";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3 - Backup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Desafio 3: Backup de Dados</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="desafio">
                <h3>Protegendo seus dados</h3>
                <p>Seu computador apresentou problemas e você corre o risco de perder todos os seus arquivos importantes, incluindo fotos, documentos e trabalhos da faculdade.</p>
                <p>Para evitar esse tipo de problema no futuro, onde você deveria guardar cópias de segurança (backup) dos seus arquivos?</p>
                
                <form method="post">
                    <div class="form-group">
                        <label for="resposta">Digite sua resposta:</label>
                        <input type="text" id="resposta" name="resposta" required>
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