<?php
declare(strict_types=1);

## NÍVEL 2: INTERMEDIÁRIO (Lógica Booleana e elseif)
## Exercício 4: Autenticação de Sistema (Login Múltiplo)

$cargoUsuario = "Diretor";
$senhaDigitada = "SenhaSegura123";

$senhaSistema = "SenhaSegura123";

if (
    $senhaDigitada === $senhaSistema &&
    ($cargoUsuario === "Diretor" || $cargoUsuario === "Gerente")
) {
    echo "Acesso Liberado";
} else {
    echo "Acesso Negado";
}
?>