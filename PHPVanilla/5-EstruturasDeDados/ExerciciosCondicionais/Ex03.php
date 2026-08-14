<?php
declare(strict_types=1);

## NÍVEL 2: INTERMEDIÁRIO (Lógica Booleana e elseif)
## Exercício 3: Clínica Médica (Cálculo de IMC)

$peso = 150;
$altura = 1.80;

$imc = $peso / ($altura * $altura);

if ($imc < 18.5) {
    echo "Abaixo do peso";
} elseif ($imc < 25) {
    echo "Peso Normal";
} elseif ($imc < 30) {
    echo "Sobrepeso";
} elseif ($imc < 35) {
    echo "Obesidade Grau I";
} else {
    echo "Obesidade Grau II ou III";
}

?>