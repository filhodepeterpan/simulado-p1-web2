<?php
session_start();

if (!isset($_SESSION['nome'])){
    header('Location: ../../index.php');
    exit("Você precisa estar logado para acessar esta página!");
}

if (!$_POST['concluido'] ?? false) {
    header('Location: ../pages/quiz.php');
    exit("Você precisa responder o questionário para acessar esta página!");
}

include '../scripts/funcoes.php';

$nome = $_SESSION['nome'];
$email = $_COOKIE['email'];
$recorde = $_SESSION['recorde'] ?? 0;
$questionario = $_SESSION['questionario'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $respostasUsuario = $_POST['respostas'] ?? [];
    $acertos = confGabarito($questionario, $respostasUsuario);

    if ($acertos > $recorde) {
        $_SESSION['recorde'] = $acertos;
    }

    $mensagemMotivacional = mensagemMotivacional();
    $_SESSION['concluido'] = false;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Simulado P1</title>
</head>
<body>
    <header>
        <div id="titulo">
            <h1>Simulado P1</h1>
        </div>
        <div id="conta">
            <p><b>Aluno:</b> <?= $nome ?></p>
            <p><b>Email:</b> <?= $email ?></p>
            <form action="../scripts/logout.php" method="POST">
                <button type="submit">Sair</button>
            </form>
        </div>
    </header>

    <main>
        <div id="resultado">
            <h2>Prontinho, <?= $nome ?>!</h2>
            <h3>Seu resultado foi: <?= $acertos ?> / <?= count($questionario) ?></h3>
            <br>
            <p>Seu recorde atual é: <b><?= isset($_SESSION['recorde']) ? $_SESSION['recorde'] : 0 ?></b></p>
            <?php if ($acertos >= 18): ?>
                <p>Excelente!</p>

            <?php elseif ($acertos >= 11): ?>
                <p>Quase lá!</p>
            
            <?php else: ?>
                <p>Precisa revisar...</p>

            <?php endif; ?> 
            <br><br>
            <div id="mensagem-motivacional">
                <span>"<?= $mensagemMotivacional?>."</span>
            </div>
        </div>
    </main>
    <script src="../../js/script.js"></script>
</body>
</html>