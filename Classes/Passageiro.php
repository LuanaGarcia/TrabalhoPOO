<?php

require_once 'Pessoa.php';
require_once 'Bagagem.php';
require_once 'Passagem.php';

class Passageiro extends Pessoa {
    private string $identificador;
    private ?Passagem $passagem; // Propriedade para armazenar a passagem (agora pode ser nula)
    private ?Bagagem $bagagem; // Propriedade para armazenar a bagagem (agora pode ser nula)

    // Construtor agora aceita valores nulos para Passagem e Bagagem
    public function __construct(string $identificador, ?Passagem $passagem, ?Bagagem $bagagem) {
        $this->identificador = $identificador;
        $this->passagem = $passagem;
        $this->bagagem = $bagagem;
    }

    // Retorna o identificador do passageiro
    public function getIdentificador(): string {
        return $this->identificador;
    }

    // Retorna a passagem do passageiro (pode ser nula)
    public function getPassagem(): ?Passagem {
        return $this->passagem;
    }

    // Retorna a bagagem do passageiro (pode ser nula)
    public function getBagagem(): ?Bagagem {
        return $this->bagagem;
    }

    // Atualiza a passagem do passageiro
    public function setPassagem(?Passagem $passagem): void {
        $this->passagem = $passagem;
    }

    // Atualiza a bagagem do passageiro
    public function setBagagem(?Bagagem $bagagem): void {
        $this->bagagem = $bagagem;
    }
}
?>