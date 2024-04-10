<?php
require_once 'Cidade.php';
require_once 'Porte.php';
class Aeroporto {
  private string $nome;
  private Cidade $cidade;
  private string $codigo;
  private int $numPistas;
  private int $pistaDisponivel;
  private Porte $porte;
  private array $voos = [];

  public function __construct(string $nome, Cidade $cidade, string $codigo, int $numPistas, int $pistaDisponivel, Porte $porte, array $voos){
    $this->nome = $nome;
    $this->cidade = $cidade;
    $this->codigo = $codigo;
    $this->numPistas = $numPistas;
    $this->pistaDisponivel = $numPistas; // Inicialmente, todas as pistas estão disponíveis
    $this->porte = $porte;
}

  
public function getNome(): string {
  return $this->nome;
}

public function getCidade(): Cidade {
  return $this->cidade;
}

public function getCodigo(): string {
  return $this->codigo;
}

public function getNumPistas(): int {
  return $this->numPistas;
}

public function getPistasDisponiveis(): int {
  return $this->pistaDisponivel;
}

public function getPorte(): Porte {
  return $this->porte;
}

public function getVoos(): array {
  return $this->voos;
}

public function adicionarVoo(Voo $voo): void {
  if ($this->pistaDisponivel > 0) {
      $this->voos[] = $voo;
      $this->pistaDisponivel--;
      echo "Voo adicionado ao aeroporto: " . $voo->getId() . "\n";
  } else {
      echo "Não há pistas disponíveis para adicionar o voo.\n";
  }
}

public function removerVoo(string $vooId): void {
  foreach ($this->voos as $index => $voo) {
      if ($voo->getId() === $vooId) {
          unset($this->voos[$index]);
          $this->pistaDisponivel++;
          echo "Voo removido do aeroporto: $vooId\n";
          return;
      }
  }
  echo "Voo não encontrado: $vooId\n";
}

public function setNumPistas(int $numPistas): void {
  $this->numPistas = $numPistas;
  // Ajustar pistas disponíveis se o número de pistas for reduzido
  $this->pistaDisponivel = min($this->pistaDisponivel, $numPistas);
}
}