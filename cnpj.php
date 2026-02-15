<?php
function gerarCNPJ() {
    $cnpj = [];

    // Gera os 12 primeiros números
    for ($i = 0; $i < 12; $i++) {
        $cnpj[] = rand(0, 9);
    }

    // Calcula os dígitos verificadores
    $cnpj[] = calcularDigitoCNPJ($cnpj, [5,4,3,2,9,8,7,6,5,4,3,2]);
    $cnpj[] = calcularDigitoCNPJ($cnpj, [6,5,4,3,2,9,8,7,6,5,4,3,2]);

    return formatarCNPJ($cnpj);
}

function calcularDigitoCNPJ($cnpj, $pesos) {
    $soma = 0;

    for ($i = 0; $i < count($pesos); $i++) {
        $soma += $cnpj[$i] * $pesos[$i];
    }

    $resto = $soma % 11;
    return ($resto < 2) ? 0 : 11 - $resto;
}

function formatarCNPJ($cnpj) {
    $n = implode('', $cnpj);
    return substr($n,0,2).".".substr($n,2,3).".".substr($n,5,3)."/".substr($n,8,4)."-".substr($n,12,2);
}

$cnpj = gerarCNPJ();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CNPJ Gerado</title>
    <style>
        .design {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            animation: aparecer 0.5s ease-in-out;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family:Arial
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body style="text-align:center; padding-top:80px; font-family:Arial;">
<div class='design'>
    <h2>✅ CNPJ Gerado</h2>
    <p style="font-size:22px;"><strong><?= $cnpj ?></strong></p>

    <a href="cnpj.php">🔄 Gerar outro</a><br><br>
    <a href="index.php">⬅ Voltar</a>
</div>


</body>
</html>
