<?php

class Aeronave {
  private string $modelo;
  private int $capacidade;
  private string $status;

	public function __construct(string $modelo, int $capacidade, string $status){
    $this->modelo = $modelo;
    $this->capacidade = $capacidade;
    $this->status = $status;
  }

	public function getModelo(): string {
    return $this->modelo;
  }

	public function getCapacidade(): int {
    return $this->capacidade;
  }

	public function getStatus(): string {
    return $this->status ?? 'Invalido!';
  }

  public function setModelo(string $modelo): void {
    $this->modelo = $modelo;
  }

	public function setCapacidade(int $capacidade): void {
    $this->capacidade = $capacidade;
  }

	public function editStatus(string $status): void {
    if($status == 'Manutenção' || $status == 'Livre' || $status == 'Inoperante'){
      $this->status = $status;
    }
  }
}