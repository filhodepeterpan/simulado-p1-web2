<?php
session_start();

if (!isset($_SESSION['nome'])){
    header('Location: ../index.php');
    exit("Você precisa estar logado para acessar esta página!");
}

if (!$_POST['concluido'] ?? false) {
    header('Location: questionario.php');
    exit("Você precisa responder o questionário para acessar esta página!");
}

include 'funcoes.php';

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

    $_SESSION['concluido'] = false;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Simulado P1</title>
</head>
<body>
    <header>
        <div id="titulo">
            <h1>Simulado P1</h1>
        </div>
        <div id="conta">
            <p>Aluno: <?= $nome ?></p>
            <p>Email: <?= $email ?></p>
            <form action=logout.php method="POST">
                <button type="submit">Sair</button>
            </form>
        </div>
    </header>

    <main>
        <div>
            <?php 
            echo "<h2>Resultado: $acertos / " . count($questionario) . "</h2>";
            echo "<br>Seu recorde atual é: " . $_SESSION['recorde'];
            ?>
        </div>
    </main>
</body>
</html>