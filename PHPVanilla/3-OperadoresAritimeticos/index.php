<?php
// 1. Blindagem de operações entre variáveis de tipos diferentes
declare(strict_types=1);

//Criar um cálculo de HOLERITE em PHP
// 2. Declaração de constantes

const TAXAS_INSS = 0.08;//8% -> 8/100
const DESCONTO_VT = 150.00; 

// 3. Declarar variáveis 
// Dados do funcionário
$nomeFuncionario = "João Silva";
$salarioBase = 3200.00;
$horasExtras = 10; //10 horas extras no mês

// Declaração de variáveis usando o LowerCamelCase
//Regra -> primeira palavra toda minúscula e depois as demais palavras usa-se maiúsculas na primeira letra

//4. Calcúlos do salário
// Valor da hora extra (1.6 da hora normal)
$valorHoraExtra = ($salarioBase/220) * 1.6;
//  Crie uma variável $totaldeHorasExtras
$totalHoraExtra = $valorHoraExtra * $horasExtras;  
// -> Crie uma variável $salarioBruto
$salarioBruto = $salarioBase + $valorHoraExtra;
// -> Criar a variável descontoInss
$descontoInss = $salarioBruto * TAXAS_INSS;
// -> Criar a variável $salarioLiquido
$salarioLiquido = ($salarioBruto- $descontoInss) - DESCONTO_VT;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holeriete <?php echo $nomeFuncionario ?></title>
<!-- folha de estilização do CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2> Demonstrativo de Pagamento </h2>
<!-- Saída de Dados misturando HTML e PHP em uma tabela -->
<table>
    <tr>
        <th>Colaborador(a)</th>
        <td><?php echo $nomeFuncionario; ?></td>
    </tr>
    <tr>
        <th> Salário Base</th>
       <td>R$ <?php echo number_format($salarioBase, 2, ",","."); ?></td>
        <!--usando uma função chamada number_format (formata a saída de números) -->
    </tr>
    <!-- fazer as demais linhas da tabela utilizando as variáveis criadas -->
<tr>
        <th>Valor Horas Extras</th>
        <td><?php echo number_format($valorHoraExtra, 2,",","."); ?> </td>
</tr>
<tr>
        <th> Valor do Salário Bruto</th>
        <td><?php echo number_format($salarioBruto, 2, ",","."); ?> </td>
</tr>
<tr>
        <th>Desconto INSS</th>
        <td><?php echo number_format ($descontoInss, 2, ",", "."); ?></td>
</tr>
<tr>
        <th> Valor do salário Líquido</th>
        <td><?php echo number_format ($salarioLiquido, 2, ",", "."); ?></td>
</tr>

</table>


</body>
</html>