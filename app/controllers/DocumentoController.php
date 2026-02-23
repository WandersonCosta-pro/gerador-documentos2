<?php

require_once __DIR__ . '/../Models/Documento.php';

class DocumentoController {

    public function home() {
        require_once __DIR__ . '/../Views/home.php';
    }

    public function cpf() {
        $documento = new Documento();
        $cpf = $documento->gerarCPF();

        require_once __DIR__ . '/../Views/cpf.php';
    }

    public function cnpj() {
        $documento = new Documento();
        $cnpj = $documento->gerarCNPJ();

        require_once __DIR__ . '/../Views/cnpj.php';
    }
}
