<?php
declare(strict_types=1);

## NÍVEL 1: FUNDAMENTOS (if / else e Ternário)
## Exercício 2: O Operador de 1 Linha (E-commerce)

$valorCompra = 400.5;

$statusFrete = ($valorCompra >= 250) ? "Frete Grátis" : "Frete R$25,00";
echo "$statusFrete";

?>