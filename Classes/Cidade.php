<?php
require_once 'Porte.php';
class Cidade {
    private string $nome;
    private string $estado;
    private Porte $porte; // Incluir o porte da cidade

    public function __construct(string $nome, string $estado, Porte $porte) {
        $this->nome = $nome;
        $this->estado = $estado;
        $this->porte = $porte;
    }

    // Getters e setters conforme necessário
    public function getNome(): string {
        return $this->nome;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getPorte(): Porte {
        return $this->porte;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function setPorte(Porte $porte): void {
        $this->porte = $porte;
    }

    public function infoCidade(): string {
        return "Nome: {$this->nome}, Estado: {$this->estado}, Porte: {$this->porte}";
    }
}