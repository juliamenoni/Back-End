<?php
declare(strict_types=1);

// Exercício 7 - Relatório de Notas

function calcularMedia(array $notas): float
{
    return array_sum($notas) / count($notas);
}

function verificarAprovacao(float $media): string
{
    if ($media >= 7) {
        return "Aprovado";
    } else {
        return "Reprovado";
    }
}

$notas = [8.0, 7.5, 6.0, 9.0];

$media = calcularMedia($notas);
$situacao = verificarAprovacao($media);
$maiorNota = max($notas);
$menorNota = min($notas);

echo "Média: " . number_format($media, 2, ",", ".") . "\n";
echo "Situação: " . $situacao . "\n";
echo "Maior nota: " . $maiorNota . "\n";
echo "Menor nota: " . $menorNota . "\n";
?>