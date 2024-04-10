<?php
require_once 'Tripulacao.php';
require_once 'Pessoa.php';
class Comissario extends Tripulacao {
    private array $idiomas = [];
    private bool $treinamentoEmergencia;
    private int $anosExperiencia;

    public function __construct(
        array $idiomas,
        bool $treinamentoEmergencia,
        int $anosExperiencia,
        Tripulacao $salario,
        Tripulacao $alcunha,
        Pessoa $nome,
        Pessoa $email
    ) {
        $this->idiomas = $idiomas;
        $this->treinamentoEmergencia = $treinamentoEmergencia;
        $this->anosExperiencia = $anosExperiencia;
        $this->salario = $salario;
        $this->alcunha = $alcunha;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getIdiomas(): array {
        return $this->idiomas;
    }

    public function addIdioma(string $idioma): void {
        $this->idiomas[] = $idioma;
    }

    public function getTreinamentoEmergencia(): bool {
        return $this->treinamentoEmergencia;
    }

    public function setTreinamentoEmergencia(bool $treinamentoEmergencia): void {
        $this->treinamentoEmergencia = $treinamentoEmergencia;
    }

    public function getAnosDeExperiencia(): int {
        return $this->anosExperiencia;
    }

    public function setAnosDeExperiencia(int $anosExperiencia): void {
        $this->anosExperiencia = $anosExperiencia;
    }


    public function trabalhar(): string {
        return 'O comissário está atendendo os passageiros.';
    }
}