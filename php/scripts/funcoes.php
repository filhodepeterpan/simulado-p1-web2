<?php
function confGabarito($questionario, $respostasUsuario) {
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

    return $acertos;
}

function mensagemMotivacional() {
    $url = 'https://raw.githubusercontent.com/devmatheusguerra/frasesJSON/main/frases.json';
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resposta = curl_exec($ch);
    $mensagens = json_decode($resposta, true);

    $i = array_rand($mensagens);
    return $mensagens[$i]['frase'];
}

?>