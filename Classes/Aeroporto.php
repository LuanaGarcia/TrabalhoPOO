<?php

class Aeroporto {
  private string $nome;
  private Cidade $cidade;
  private string $codigo;
  private int $numPistas;
  private int $pistaDisponivel;
  private Porte $porte;
  private array $voos;

  public function __construct(string $nome, Cidade $cidade, string $codigo, int $numPistas, int $pistaDisponivel, Porte $porte, array $voos){
    $this->nome = $nome;
    $this->cidade = $cidade;
    $this->codigo = $codigo;
    $this->numPistas = $numPistas;
    $this->pistaDisponivel = $pistaDisponivel;
    $this->porte = $porte;
    $this->voos = $voos;}
	

  
}