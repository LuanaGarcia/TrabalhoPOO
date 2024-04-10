<?php
require_once 'Pessoa.php';
// Classe Tripulacao herda de Pessoa
class Tripulacao extends Pessoa {
    protected float $salario;
    protected string $alcunha;

    public function __construct(string $nome, string $email, float $salario, string $alcunha) {
        $this->salario = $salario;
        $this->alcunha = $alcunha;
        // Chamando o construtor da classe pai Pessoa
        parent::__construct($nome, $email);
    }

    // Métodos de acesso - Getters e Setters
    public function getSalario(): float {
        return $this->salario;
    }

    public function getAlcunha(): string {
        return $this->alcunha;
    }

    public function setSalario(float $salario): void {
        $this->salario = $salario;
    }

    public function setAlcunha(string $alcunha): void {
        $this->alcunha = $alcunha;
    }

    public function trabalhar(): string {
        return 'O tripulante está trabalhando.';
    }
}