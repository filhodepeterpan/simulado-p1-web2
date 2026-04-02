<?php
session_start();

if (!isset($_SESSION['nome'])){
    header('Location: ../../index.php');
    exit("Você precisa estar logado para acessar esta página!");
}

$nome = $_SESSION['nome'];
$email = $_COOKIE['email'];
$recorde = $_SESSION['recorde'] ?? 0;

$questionario = $_SESSION['questionario'] ?? [];

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
        <div id="questionario">

            <form action="resultado.php" method="POST">

                <?php foreach($questionario as $questao):?>
                    <h3 id="enunciado"><?= $questao['num'] ?>. <?= $questao['enunciado']?></h3>
                      
                    <?php if ($questao['tipoQuestao'] == 'select'):?>
                        <div class="questao">
                            <select name="respostas[<?= $questao['num'] ?>]">
                                <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                    <option value="<?= $alternativa ?>"><?= $alternativa ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    
                    <?php if ($questao['tipoQuestao'] == 'checkbox'):?>
                        <div class="questao">
                            <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                <input type="checkbox" name="respostas[<?= $questao['num'] ?>][]" value="<?= $alternativa ?>"><?= $alternativa ?>
                                <br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($questao['tipoQuestao'] == 'radio'):?>
                        <div class="questao">
                            <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                <input type="radio" name="respostas[<?= $questao['num'] ?>]" value="<?= $alternativa ?>"> <?= $alternativa ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
                
                <input type="hidden" name="concluido" value="concluido">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>