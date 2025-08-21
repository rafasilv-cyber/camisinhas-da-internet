<?php
require_once 'classes/Jogo.php';

// Se o botão jogar foi clicado, inicia o jogo
if (isset($_POST['jogar'])) {
    $jogo = new Jogo();
    $jogo->iniciar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segurança Digital - Jogo Educativo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Segurança Digital</h1>
            <h2>Jogo Educativo sobre Segurança na Internet</h2>
        </header>
        
        <main>
            <section class="intro">
                <p>Bem-vindo ao jogo educativo sobre Segurança Digital! Teste seus conhecimentos sobre senhas fortes, phishing, backup, autenticação e privacidade.</p>
                
                <form method="post">
                    <button type="submit" name="jogar" class="btn-jogar">Jogar</button>
                </form>
                
                <a href="tutorial.php" class="link-tutorial">Como Jogar</a>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2025 - Jogo Educativo - Desenvolvimento de Sistemas</p>
        </footer>
    </div>
</body>
</html>