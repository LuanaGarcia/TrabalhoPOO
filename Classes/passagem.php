<?php
class Passagem {
    private string $numPassagem;
    private float $valor;
    private Voo $voo;
    private passageiro $passageiro;
    private DateTime $dataHora;

    public function __construct(string $numPassagem, float $valor, Voo $voo, passageiro $passageiro, DateTime $dataHora){
      $this->numPassagem = $numPassagem;
      $this->valor = $valor;
      $this->voo = $voo;
      $this->passageiro = $passageiro;
      $this->dataHora = $dataHora;}
	
    public function getNumPassagem(): string {
      return $this->numPassagem;
    }

    public function getValor(): float {
      return $this->valor;
    }

    public function getVoo(): Voo {
      return $this->voo;
    }

    public function getPassageiro(): passageiro {
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

    public function setPassageiro(passageiro $passageiro): void {
      $this->passageiro = $passageiro;
    }

    public function setDataHora(DateTime $dataHora): void {
      $this->dataHora = $dataHora;
    }
	
}