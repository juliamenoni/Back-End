<?php
declare(strict_types=1);

## NÍVEL 1: FUNDAMENTOS (if / else e Ternário)
## Exercício 1: O Sistema do TSE (Votação)

$idade = 25;
if ($idade < 16) {
    echo "Voto Proibido";
} elseif (($idade >= 16 && $idade <= 17) || $idade >= 70) {
    echo "Voto Facultativo";
} else {
    echo "Voto obrigatório";
}
?>
