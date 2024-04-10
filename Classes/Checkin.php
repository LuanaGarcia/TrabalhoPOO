<?php

require_once 'Passageiro.php';
require_once 'Voo.php';

class Checkin {
    private Passageiro $passageiro;
    private Voo $voo;
    private bool $realizado = false;

    public function __construct(Passageiro $passageiro, Voo $voo) {
        $this->passageiro = $passageiro;
        $this->voo = $voo;
    }

    public function realizarCheckin(): void {
        // Verifica se o check-in já foi realizado.
        if ($this->realizado) {
            echo "Check-in já foi realizado para o passageiro " . $this->passageiro->getIdentificador() . ".\n";
            return;
        }

        // Verifica se o voo está cheio.
        if ($this->voo->isVooCheio()) {
            echo "Não é possível realizar o check-in: o voo está cheio.\n";
            return;
        }

        // Verifica se ainda está no prazo para fazer check-in.
        if (!$this->podeRealizarCheckin()) {
            echo "Não é possível realizar o check-in: período de check-in encerrado.\n";
            return;
        }

        // Verifica se a passagem é válida para o voo.
        if (!$this->passageiro->getPassagem()->isValidaParaVoo($this->voo)) {
            echo "Não é possível realizar o check-in: a passagem não é válida para este voo.\n";
            return;
        }

        // Se passar por todas as verificações, realiza o check-in.
        $this->realizado = true;
        $this->voo->adicionarPassageiro($this->passageiro);
        echo "Check-in realizado com sucesso para o passageiro " . $this->passageiro->getIdentificador() . " no voo " . $this->voo->getId() . ".\n";
    }

    public function cancelarCheckin(): void {
        // Verifica se o check-in já foi realizado.
        if (!$this->realizado) {
            echo "Não foi possível cancelar o check-in: nenhum check-in ativo para o passageiro " . $this->passageiro->getIdentificador() . ".\n";
            return;
        }

        // Cancela o check-in.
        $this->realizado = false;
        echo "Check-in cancelado para o passageiro " . $this->passageiro->getIdentificador() . ".\n";
    }

    public function isRealizado(): bool {
        return $this->realizado;
    }

    public function getPassageiro(): Passageiro {
        return $this->passageiro;
    }

    public function getVoo(): Voo {
        return $this->voo;
    }

    public function podeRealizarCheckin(): bool {
        $periodoCheckin = new DateInterval('PT2H'); // Define o período de check-in como 2 horas antes da partida.
        $inicioCheckin = (clone $this->voo->getDataHoraPartida())->sub($periodoCheckin);
        $agora = new DateTime();
        return $agora >= $inicioCheckin && $agora < $this->voo->getDataHoraPartida();
    }
}