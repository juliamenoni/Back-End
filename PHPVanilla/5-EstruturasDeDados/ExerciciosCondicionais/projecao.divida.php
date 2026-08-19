<?php

$categoriaCliente = 'A';
$divida = 1000.00;

$taxa = match ($categoriaCliente) {
    'A' => 0.01,
    'B' => 0.02,
    'C' => 0.03,
    default => 0.05
};

for ($mes = 1; $mes <= 12; $mes++) {

    if ($mes == 6) {
        echo "Mês $mes: ISENCAO DE JUROS\n";
        echo "Saldo: R$ " . number_format($divida, 2, ',', '.') . "\n";
        continue;
    }

    $juros = $divida * $taxa;
    $divida = $divida + $juros;

    echo "Mes $mes:\n";
    echo "Juros: R$ " . number_format($juros, 2, ',', '.') . "\n";
    echo "Saldo: R$ " . number_format($divida, 2, ',', '.') . "\n";
}
