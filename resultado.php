<?php
require_once 'classes/Jogo.php';

$jogo = new Jogo();

// Verifica se o jogador concluiu todos os desafios
if (!$jogo->foiConcluido()) {
    // Se não concluiu, redireciona para o nível atual
    $nivelAtual = $jogo->getNivelAtual();
    header("Location: desafio{$nivelAtual}.php");
    exit;
}

// Calcula a porcentagem de acerto
$pontuacaoMaxima = 100; // Soma de todos os pontos possíveis
$pontuacaoAtual = $jogo->getPontuacao();
$porcentagem = ($pontuacaoAtual / $pontuacaoMaxima) * 100;

// Define a mensagem com base na pontuação
if ($porcentagem >= 90) {
    $mensagem = "Excelente! Você é um especialista em segurança digital!";
} elseif ($porcentagem >= 70) {
    $mensagem = "Muito bom! Você tem bons conhecimentos sobre segurança digital.";
} elseif ($porcentagem >= 50) {
    $mensagem = "Bom trabalho! Você está no caminho certo para se proteger online.";
} else {
    $mensagem = "Continue aprendendo! A segurança digital é um processo contínuo.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - Segurança Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .resultado {
            text-align: center;
            padding: 20px;
        }
        
        .pontuacao {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .mensagem {
            font-size: 18px;
            margin-bottom: 30px;
        }
        
        .resumo {
            margin: 20px 0;
            text-align: left;
        }
        
        .resumo h4 {
            margin-bottom: 10px;
        }
        
        .resumo ul {
            list-style-type: disc;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Resultados Finais</h1>
            <h2>Segurança Digital</h2>
        </header>
        
        <main>
            <section class="resultado">
                <h3>Parabéns por completar todos os desafios!</h3>
                
                <div class="pontuacao">
                    Sua pontuação: <?php echo $pontuacaoAtual; ?> de <?php echo $pontuacaoMaxima; ?> pontos (<?php echo round($porcentagem); ?>%)
                </div>
                
                <div class="mensagem">
                    <?php echo $mensagem; ?>
                </div>
                
                <div class="resumo">
                    <h4>Resumo dos desafios:</h4>
                    <ul>
                        <li><strong>Desafio 1:</strong> Criação de senhas fortes - 10 pontos</li>
                        <li><strong>Desafio 2:</strong> Identificação de phishing - 15 pontos</li>
                        <li><strong>Desafio 3:</strong> Backup de dados - 20 pontos</li>
                        <li><strong>Desafio 4:</strong> Métodos de autenticação - 25 pontos</li>
                        <li><strong>Desafio 5:</strong> Privacidade online - 30 pontos</li>
                    </ul>
                </div>
                
                <a href="index.php" class="btn-jogar">Jogar Novamente</a>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2025 - Jogo Educativo - Desenvolvimento de Sistemas</p>
        </footer>
    </div>
</body>
</html>