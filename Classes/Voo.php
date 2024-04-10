<?php

require_once 'Aeroporto.php';
require_once 'Aeronave.php';

class Voo
{
    private string $id;
    private Aeroporto $aeroportoOrigem;
    private Aeroporto $aeroportoDestino;
    private array $escalas = [];
    private Aeronave $aeronave;
    private array $passageiros = [];
    private array $tripulacao = []; // Adicionando atributo para armazenar a tripulação
    private DateTime $dataHoraSaida;

    public function __construct(string $id, Aeroporto $aeroportoOrigem, Aeroporto $aeroportoDestino, Aeronave $aeronave, DateTime $dataHoraSaida)
    {
        $this->id = $id;
        $this->aeroportoOrigem = $aeroportoOrigem;
        $this->aeroportoDestino = $aeroportoDestino;
        $this->aeronave = $aeronave;
        $this->dataHoraSaida = $dataHoraSaida;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function adicionarEscala(Aeroporto $aeroporto, DateTime $horaChegada): void
    {
        $this->escalas[] = ['aeroporto' => $aeroporto, 'horaChegada' => $horaChegada];
    }

    public function adicionarPassageiro(Passageiro $passageiro): bool
    {
        if (count($this->passageiros) < $this->aeronave->getCapacidade()) {
            $this->passageiros[] = $passageiro;
            return true;
        }
        return false;
    }

    public function isVooCheio(): bool
    {
        return count($this->passageiros) >= $this->aeronave->getCapacidade();
    }

    public function podeFazerCheckin(): bool
    {
        $periodoCheckin = new DateInterval('PT2H'); // Define o período de check-in como 2 horas antes da partida.
        $inicioCheckin = (clone $this->dataHoraSaida)->sub($periodoCheckin);
        $agora = new DateTime();
        return $agora >= $inicioCheckin && $agora < $this->dataHoraSaida;
    }

    public function getPassageiros(): array
    {
        return $this->passageiros;
    }

    public function getEscalas(): array
    {
        return $this->escalas;
    }

    public function getDataHoraPartida(): DateTime
    {
        return $this->dataHoraSaida;
    }

    // Método para adicionar tripulante ao voo
    public function adicionarTripulante(Tripulacao $tripulante): void
    {
        $this->tripulacao[] = $tripulante;
    }

    // Método para obter a tripulação do voo
    public function getTripulacao(): array
    {
        return $this->tripulacao;
    }

    public function calculaTempoVoo(DateTime $horarioSaida, DateTime $horarioChegada): int
    {
        $diferencaSegundos = $horarioChegada->getTimestamp() - $horarioSaida->getTimestamp();
        $diferencaMinutos = floor($diferencaSegundos / 60);

        return $diferencaMinutos;
    }
}
