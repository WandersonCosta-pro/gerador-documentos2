<?php

namespace App\Models;

class Documento {

    public function gerarCPF() {
        $cpf = [];

        for ($i = 0; $i < 9; $i++) {
            $cpf[] = rand(0, 9);
        }

        $cpf[] = $this->calcularDigitoCPF($cpf);
        $cpf[] = $this->calcularDigitoCPF($cpf);

        return $this->formatarCPF($cpf);
    }

    private function calcularDigitoCPF($cpf) {
        $soma = 0;
        $peso = count($cpf) + 1;

        foreach ($cpf as $num) {
            $soma += $num * $peso--;
        }

        $resto = ($soma * 10) % 11;
        return ($resto == 10) ? 0 : $resto;
    }

    private function formatarCPF($cpf) {
        $n = implode('', $cpf);
        return substr($n,0,3).".".substr($n,3,3).".".substr($n,6,3)."-".substr($n,9,2);
    }

    public function gerarCNPJ() {
        $cnpj = [];

        for ($i = 0; $i < 12; $i++) {
            $cnpj[] = rand(0, 9);
        }

        $cnpj[] = $this->calcularDigitoCNPJ($cnpj, [5,4,3,2,9,8,7,6,5,4,3,2]);
        $cnpj[] = $this->calcularDigitoCNPJ($cnpj, [6,5,4,3,2,9,8,7,6,5,4,3,2]);

        return $this->formatarCNPJ($cnpj);
    }

    private function calcularDigitoCNPJ($cnpj, $pesos) {
        $soma = 0;

        for ($i = 0; $i < count($pesos); $i++) {
            $soma += $cnpj[$i] * $pesos[$i];
        }

        $resto = $soma % 11;
        return ($resto < 2) ? 0 : 11 - $resto;
    }

    private function formatarCNPJ($cnpj) {
        $n = implode('', $cnpj);
        return substr($n,0,2).".".substr($n,2,3).".".substr($n,5,3)."/".substr($n,8,4)."-".substr($n,12,2);
    }
}