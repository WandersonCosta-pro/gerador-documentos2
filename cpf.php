<?php
function gerarCPF() {
    $cpf = [];

    for ($i = 0; $i < 9; $i++) {
        $cpf[] = rand(0, 9);
    }

    $cpf[] = calcularDigitoCPF($cpf);
    $cpf[] = calcularDigitoCPF($cpf);

    return formatarCPF($cpf);
}

function calcularDigitoCPF($cpf) {
    $soma = 0;
    $peso = count($cpf) + 1;

    foreach ($cpf as $num) {
        $soma += $num * $peso--;
    }

    $resto = ($soma * 10) % 11;
    return ($resto == 10) ? 0 : $resto;
}

function formatarCPF($cpf) {
    $n = implode('', $cpf);
    return substr($n,0,3).".".substr($n,3,3).".".substr($n,6,3)."-".substr($n,9,2);
}

$cpf = gerarCPF();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CPF Gerado</title>
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
<body>


<div class='design'>
    <h2>✅ CPF Gerado</h2>
    <p style="font-size:22px;"><strong><?= $cpf ?></strong></p>

    <a href="cpf.php" >🔄 Gerar outro</a><br><br>
    <a href="index.php">⬅ Voltar</a>
</div>
</body>
</html>
