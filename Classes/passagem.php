<?php

require_once 'Voo.php';
require_once 'Passageiro.php';

class Passagem {
    private string $numPassagem;
    private float $valor;
    private Voo $voo;
    private ?Passageiro $passageiro; // Agora pode ser nulo
    private DateTime $dataHora;

    public function __construct(string $numPassagem, float $valor, Voo $voo, ?Passageiro $passageiro, DateTime $dataHora) {
        $this->numPassagem = $numPassagem;
        $this->valor = $valor;
        $this->voo = $voo;
        $this->passageiro = $passageiro;
        $this->dataHora = $dataHora;
    }

    public function getNumPassagem(): string {
        return $this->numPassagem;
    }

    public function getValor(): float {
        return $this->valor;
    }

    public function getVoo(): Voo {
        return $this->voo;
    }

    public function getPassageiro(): Passageiro {
        return $this->passageiro;
    }

    public function getDataHora(): DateTime {
        return $this->dataHora;
    }

    public function setNumPassagem(string $numPassagem): void {
        $this->numPassagem = $numPassagem;
    }

    public function setValor(float $valor): void {
        $this->valor = $valor;
    }

    public function setVoo(Voo $voo): void {
        $this->voo = $voo;
    }

    public function setPassageiro(Passageiro $passageiro): void {
        $this->passageiro = $passageiro;
    }

    public function setDataHora(DateTime $dataHora): void {
        $this->dataHora = $dataHora;
    }

    public function isValidaParaVoo(Voo $voo): bool {
        // Verifica se o número do voo e a data do voo correspondem às informações na passagem.
        return $this->voo->getId() === $voo->getId() && $this->dataHora == $voo->getDataHoraPartida();
    }
}