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

?>