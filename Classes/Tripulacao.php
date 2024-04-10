<?php
require_once 'Pessoa.php';

class Tripulacao extends Pessoa {
    protected float $salario;
    protected string $alcunha;

    public function __construct(string $nome, string $email, float $salario, string $alcunha) {
        $this->salario = $salario;
        $this->alcunha = $alcunha;
        parent::__construct($nome, $email);
    }

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
?>