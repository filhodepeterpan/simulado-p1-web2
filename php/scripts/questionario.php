<?php
session_start();

if (!isset($_SESSION)){
    header('Location: ../../index.php');
    exit("Você precisa estar logado para acessar esta página!");
}

$_SESSION['questionario'] = [
    [ 
        'num' => 1,
        'enunciado' => "O comando echo é utilizado para:",
        'alternativas' => [
            "Receber dados",
            "Exibir dados",
            "Criar funções",
            "Encerrar o código",
        ],
        'respostaCorreta' => "Exibir dados",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 2,
        'enunciado' => "Em PHP, uma variável começa com:",
        'alternativas' => [
            "#",
            "$",
            "@",
            "&",
        ],
        'respostaCorreta' => "$",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 3,
        'enunciado' => "Qual é uma variável válida?",
        'alternativas' => [
            "$1nome",
            "\$nome_usuario",
            "nome$",
            "\$nome-usuario",
        ],
        'respostaCorreta' => "\$nome_usuario",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 4,
        'enunciado' => "Qual método envia dados pela URL?",
        'alternativas' => [
            "GET",
            "POST"
        ],
        'respostaCorreta' => "GET",
        "tipoQuestao" => "radio"
    ],
    [
        'num' => 5,
        'enunciado' => "Sobre o método POST (marque as corretas):",
        'alternativas' => [
            "Dados ficam visíveis na URL",
            "Mais seguro para envio de dados",
            "Permite envio de grande volume de dados",
            "Só funciona com textos"
        ],
        'respostaCorreta' => [
            "Mais seguro para envio de dados",
            "Permite envio de grande volume de dados"
        ],
        "tipoQuestao" => "checkbox"
    ],
    [
        'num' => 6,
        'enunciado' => "Qual input é mais adequado para senha?",
        'alternativas' => [
            "text",
            "email",
            "password",
        ],
        'respostaCorreta' => "password",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 7,
        'enunciado' => "Qual permite escolher apenas UMA opção?",
        'alternativas' => [
            "checkbox",
            "radio",
            "text",
            "textarea"
        ],
        'respostaCorreta' => "radio",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 8,
        'enunciado' => "Checkbox é usado quando:",
        'alternativas' => [
            "Apenas uma opção",
            "Múltiplas opções"
        ],
        'respostaCorreta' => "Múltiplas opções",
        "tipoQuestao" => "radio"
    ],
    [
        'num' => 9,
        'enunciado' => "A tag &lt;select&gt; serve para:",
        'alternativas' => [
            "Campo de texto",
            "Lista suspensa",
            "Botão",
            "Sessão"
        ],
        'respostaCorreta' => "Lista suspensa",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 10,
        'enunciado' => "Qual estrutura usamos para decisão?",
        'alternativas' => [
            "for",
            "echo",
            "if",
            "array"
        ],
        'respostaCorreta' => "if",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 11,
        'enunciado' => "Qual estrutura usamos para repetição?",
        'alternativas' => [
            "if",
            "echo",
            "for",
            "isset"
        ],
        'respostaCorreta' => "for",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 12,
        'enunciado' => "Um array é:",
        'alternativas' => [
            "Uma função",
            "Uma variável com múltiplos valores",
            "Um formulário",
            "Um loop"
        ],
        'respostaCorreta' => "Uma variável com múltiplos valores",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 13,
        'enunciado' => "Para criar uma função usamos:",
        'alternativas' => [
            "create",
            "function",
            "def",
            "func"
        ],
        'respostaCorreta' => "function",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 14,
        'enunciado' => "Sessões servem para:",
        'alternativas' => [
            "Armazenar no navegador",
            "Armazenar no servidor",
            "Criar HTML",
            "Fazer requisições"
        ],
        'respostaCorreta' => "Armazenar no servidor",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 15,
        'enunciado' => "Cookies são armazenados:",
        'alternativas' => [
            "No navegador",
            "No servidor"
        ],
        'respostaCorreta' => "No navegador",
        "tipoQuestao" => "radio"
    ],
    [
        'num' => 16,
        'enunciado' => "Qual função podemos consumir API?",
        'alternativas' => [
            "echo",
            "isset",
            "print_r",
            "file_get_contents"
        ],
        'respostaCorreta' => "file_get_contents",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 17,
        'enunciado' => "Sobre cURL (marque as corretas):",
        'alternativas' => [
            "Faz requisições HTTP",
            "Consome APIs",
            "Apenas imprime dados",
            "Substitui sessão"
        ],
        'respostaCorreta' => [
            "Faz requisições HTTP",
            "Consome APIs",
        ],
        "tipoQuestao" => "checkbox"
    ],
    [
        'num' => 18,
        'enunciado' => "Para acessar dados via POST usamos:",
        'alternativas' => [
            "\$_GET",
            "\$_POST",
            "\$_SESSION",
            "\$_COOKIE"
        ],
        'respostaCorreta' => "\$_POST",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 19,
        'enunciado' => "Para verificar se variável existe:",
        'alternativas' => [
            "check()",
            "isset()",
            "exist()",
            "verify()"
        ],
        'respostaCorreta' => "isset()",
        "tipoQuestao" => "select"
    ],
    [
        'num' => 20,
        'enunciado' => "Para iniciar uma sessão usamos:",
        'alternativas' => [
            "start_session()",
            "session_start()",
            "init_session()",
            "begin_session()"
        ],
        'respostaCorreta' => "session_start()",
        "tipoQuestao" => "select"
    ]

];

header('Location: ../pages/quiz.php');

?>