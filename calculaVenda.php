<?php

function calcularComissao($valorInicial, $percentualComissao)
{
    $comissao = $percentualComissao / 100;
    $comissao = $valorInicial * $comissao;

    return $comissao;
}

function calcularDesconto($valorInicial)
{
    $desconto = $valorInicial * 5 / 100;

    return $desconto;
}

function calcularValorFinal($valorInicial, $desconto)
{
    $valorFinal = $valorInicial - $desconto;

    return $valorFinal;
}

function mostrarDados($valorInicial, $percentualComissao, $comissao, $desconto, $valorFinal)
{
    echo '<p><strong>Valor inicial da venda:</strong> ' . number_format($valorInicial, 2, ',', '.') . '</p>';
    echo '<p><strong>Percentual de comissão do vendedor:</strong> ' . number_format($percentualComissao, 2, ',', '.') . '%</p>';
    echo '<p><strong>Valor da comissão do vendedor:</strong> ' . number_format($comissao, 2, ',', '.') . '</p>';
    echo '<p><strong>Valor do desconto dado ao cliente:</strong> ' . number_format($desconto, 2, ',', '.') . '</p>';
    echo '<p><strong>Valor final da compra pago pelo cliente:</strong> ' . number_format($valorFinal, 2, ',', '.') . '</p>';
}

$valorInicial = $_POST['valorInicial'];
$percentualComissao = $_POST['percentualComissao'];
$cartaoFidelidade = $_POST['cartaoFidelidade'];

$comissao = calcularComissao($valorInicial, $percentualComissao);
$desconto = 0;

if ($cartaoFidelidade === 'sim') {
    $desconto = calcularDesconto($valorInicial);
}

$valorFinal = calcularValorFinal($valorInicial, $desconto);
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resultado da venda</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main class="card">
        <h1>Resultado</h1>

        <?php mostrarDados($valorInicial, $percentualComissao, $comissao, $desconto, $valorFinal); ?>

        <a href="index.html">Nova venda</a>
    </main>
</body>

</html>