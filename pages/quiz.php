<?php
session_start();

if (!isset($_SESSION['nome'])){
    header('Location: ../index.php');
    exit("Você precisa estar logado para acessar esta página!");
}

$nome = $_SESSION['nome'];
$email = $_COOKIE['email'];
$recorde = $_SESSION['recorde'] ?? 0;

$questionario = $_SESSION['questionario'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $respostasUsuario = $_POST['respostas'] ?? [];
    $acertos = 0;

    foreach ($questionario as $questao) {

        $num = $questao['num'];

        if (!isset($respostasUsuario[$num])) { continue; }

        $respostaUsuario = $respostasUsuario[$num];
        $respostaCorreta = $questao['respostaCorreta'];

        $respostaUsuario = (array) $respostaUsuario;
        $respostaCorreta = (array) $respostaCorreta;

        sort($respostaUsuario);
        sort($respostaCorreta);

        if ($respostaUsuario == $respostaCorreta) {
            $acertos++;
        }
    }

    if ($acertos > $recorde) {
        $_SESSION['recorde'] = $acertos;
    }

    echo "<h2>Resultado: $acertos / " . count($questionario) . "</h2>";
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
            <form action=logout.php method="POST">
                <button type="submit">Sair</button>
            </form>
        </div>
    </header>
    <main>
        <div id="questionario">

            <form method="POST">

                <?php foreach($questionario as $questao):?>
                    <h3 id="enunciado"><?= $questao['num'] ?>. <?= $questao['enunciado']?></h3>
                    
                    <div class="questao">
                        <?php if ($questao['tipoQuestao'] == 'select'):?>
                            <select name="respostas[<?= $questao['num'] ?>]">
                                <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                    <option value="<?= $alternativa ?>"><?= $alternativa ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>

                    <div class="questao">
                        <?php if ($questao['tipoQuestao'] == 'checkbox'):?>
                            <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                <input type="checkbox" name="respostas[<?= $questao['num'] ?>][]" value="<?= $alternativa ?>"><?= $alternativa ?>
                                <br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="questao">
                        <?php if ($questao['tipoQuestao'] == 'radio'):?>
                            <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                <input type="radio" name="respostas[<?= $questao['num'] ?>]" value="<?= $alternativa ?>"> <?= $alternativa ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>
                
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>