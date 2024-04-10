<?php

require_once 'Aeroporto.php';
require_once 'Aeronave.php';

class Voo {
    private string $id;
    private Aeroporto $aeroportoOrigem;
    private Aeroporto $aeroportoDestino;
    private array $escalas = [];
    private Aeronave $aeronave;
    private array $passageiros = [];
    private DateTime $dataHoraPartida;

    public function __construct(string $id, Aeroporto $aeroportoOrigem, Aeroporto $aeroportoDestino, Aeronave $aeronave, DateTime $dataHoraPartida) {
        $this->id = $id;
        $this->aeroportoOrigem = $aeroportoOrigem;
        $this->aeroportoDestino = $aeroportoDestino;
        $this->aeronave = $aeronave;
        $this->dataHoraPartida = $dataHoraPartida;
    }

    public function getId(): string {
        return $this->id;
    }

    public function adicionarEscala(Aeroporto $aeroporto, DateTime $horaChegada): void {
        $this->escalas[] = ['aeroporto' => $aeroporto, 'horaChegada' => $horaChegada];
    }

    public function adicionarPassageiro(Passageiro $passageiro): bool {
        if (count($this->passageiros) < $this->aeronave->getCapacidade()) {
            $this->passageiros[] = $passageiro;
            return true;
        }
        return false;
    }

    public function isVooCheio(): bool {
        return count($this->passageiros) >= $this->aeronave->getCapacidade();
    }

    public function podeFazerCheckin(): bool {
        $periodoCheckin = new DateInterval('PT2H'); // Define o período de check-in como 2 horas antes da partida.
        $inicioCheckin = (clone $this->dataHoraPartida)->sub($periodoCheckin);
        $agora = new DateTime();
        return $agora >= $inicioCheckin && $agora < $this->dataHoraPartida;
    }

    public function getPassageiros(): array {
        return $this->passageiros;
    }

    public function getEscalas(): array {
        return $this->escalas;
    }

    public function getDataHoraPartida(): DateTime {
        return $this->dataHoraPartida;
    }
}