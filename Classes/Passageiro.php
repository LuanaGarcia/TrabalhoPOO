<?php

//Classe Passageiro herda de Pessoa
class Passageiro extends Pessoa{
  private string $identificador;
  private Passagem $passagem; //Instancia da classe Passagem
  private Bagagem $bagagem; //Instancia da classe Bagagem

  public function __construct(string $identificador, Passagem $passagem, Bagagem $bagagem) {
    $this->identificador = $identificador;
    $this-> passagem = $passagem;
    $this-> bagagem = $bagagem;
  }

  //Metodos de acesso - Getters e Setters
  public function getIdentificador(): string {
    return $this-> identificador;
  }

  public function getPassagem() : Passagem {
    return $this-> passagem;
  }

  public function getBagagem() : Bagagem {
    return $this-> bagagem;
  }

  public function setIdentificador(string $identificador) : void {
    $this-> identificador = $identificador;
  }

  public function setPassagem(Passagem $passagem) : void {
    $this-> passagem = $passagem;
  }

  public function setBagagem(Bagagem $bagagem) : void {
    $this->bagagem = $bagagem;
  }

}