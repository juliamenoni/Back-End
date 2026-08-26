<?php
declare(strict_types=1);

// Exercício 3 - Validador de Senha

function senhaForte(string $senha): bool
{
    return strlen($senha) > 8;
}

echo "Exercício 3 - Validador de Senha"."\n";
$senha = "123456789";

if (senhaForte($senha)) {
    echo "A senha é forte."."\n";
} else {
    echo "A senha é fraca. Ela deve possuir mais de 8 caracteres."."\n";
}

$senha2 = "abc123";

if (senhaForte($senha2)) {
    echo "A senha é forte."."\n";
} else {
    echo "A senha é fraca. Ela deve possuir mais de 8 caracteres."."\n";
};
