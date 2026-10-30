<?php
declare(strict_types=1);

## NÍVEL 2: INTERMEDIÁRIO (Lógica Booleana e elseif)
## Exercício 3: Clínica Médica (Cálculo de IMC)

$peso = 90.6;
$altura = 1.80;

$IMC = $peso / ($altura * $altura);

if ($IMC < 18.5) {
    echo "Abaixo do peso";
} elseif ($IMC >= 18.5 && 24.9) {
    echo "Peso normal";
} elseif ($IMC >= 25.0 && 29.9) {
    echo "Sobre peso";
} elseif ($IMC >= 30.0 && 34.9) {
    echo "Obesidade Grau 1";
} else 
    echo "Obesidade Grau II ou III";

echo " $IMC" ;

?>