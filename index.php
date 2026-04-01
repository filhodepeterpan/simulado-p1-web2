<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if(isset($nome) && isset($email)){
        $_SESSION['nome'] = $nome;
        setcookie('email', $email, time() + 60*60*24*30);

        header('Location: php/scripts/questionario.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Simulado P1 | Login</title>
</head>
<body>

    <main>
        <div id="login">
            <form action="#" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <div>
                    <button type="submit">Logar</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div>
            <p>Github: @filhodepeterpan</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>