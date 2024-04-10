<?php
require_once 'Tripulacao.php';
require_once 'Aeronave.php';
require_once 'Cidade.php';

class Piloto extends Tripulacao {
    private int $horasVoo;
    private Aeronave $tipoAeronave;
    private Cidade $baseOperacao;

    public function __construct(
        string $nome,
        string $email,
        float $salario,
        string $alcunha,
        int $horasVoo,
        Aeronave $tipoAeronave,
        Cidade $baseOperacao
    ) {
        parent::__construct($nome, $email, $salario, $alcunha);
        $this->horasVoo = $horasVoo;
        $this->tipoAeronave = $tipoAeronave;
        $this->baseOperacao = $baseOperacao;
    }

    public function getHorasVoo(): int {
        return $this->horasVoo;
    }

    public function getTipoAeronave(): Aeronave {
        return $this->tipoAeronave;
    }

    public function getBaseOperacao(): Cidade {
        return $this->baseOperacao;
    }

    public function setHorasVoo(int $horasVoo): void {
        $this->horasVoo = $horasVoo;
    }

    public function setTipoAeronave(Aeronave $tipoAeronave): void {
        $this->tipoAeronave = $tipoAeronave;
    }

    public function setBaseOperacao(Cidade $baseOperacao): void {
        $this->baseOperacao = $baseOperacao;
    }

}
?>