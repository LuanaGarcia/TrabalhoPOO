<?php
require_once 'Tripulacao.php';
require_once 'Pessoa.php';

class Comissario extends Tripulacao {
    private array $idiomas;
    private bool $treinamentoEmergencia;
    private int $anosExperiencia;

    public function __construct(
        string $nome,
        string $email,
        float $salario,
        string $alcunha,
        array $idiomas,
        bool $treinamentoEmergencia,
        int $anosExperiencia
    ) {
        parent::__construct($nome, $email, $salario, $alcunha);
        $this->idiomas = $idiomas;
        $this->treinamentoEmergencia = $treinamentoEmergencia;
        $this->anosExperiencia = $anosExperiencia;
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

    public function getAnosExperiencia(): int {
        return $this->anosExperiencia;
    }

    public function setAnosExperiencia(int $anosExperiencia): void {
        $this->anosExperiencia = $anosExperiencia;
    }

    public function verificarEquipamentoDeSeguranca(): bool {
        // Lógica para verificar o equipamento de segurança
        return true;
    }

    public function trabalhar(): string {
        return 'O comissário está atendendo os passageiros.';
    }
}
?>