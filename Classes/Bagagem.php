<?php

require_once 'Passageiro.php';

class Bagagem {
    private float $peso;
    private int $bagagem;
    private ?Passageiro $passageiro; // Agora pode ser nulo

    public function __construct(float $peso, int $bagagem, ?Passageiro $passageiro) {
        $this->peso = $peso;
        $this->bagagem = $bagagem;
        $this->passageiro = $passageiro;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getBagagem(): int {
        return $this->bagagem;
    }

    public function getPassageiro(): Passageiro {
        return $this->passageiro;
    }

    public function setPeso(float $peso): void {
        $this->peso = $peso;
    }

    public function setBagagem(int $bagagem): void {
        $this->bagagem = $bagagem;
    }

    public function setPassageiro(Passageiro $passageiro): void {
        $this->passageiro = $passageiro;
    }
}