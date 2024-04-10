<?php 

class Checkin {
    private Passageiro $passageiro;
    private Voo $voo;
    private bool $status = false;

    public function __construct(Passageiro $passageiro, Voo $voo) {
        $this->passageiro = $passageiro;
        $this->voo = $voo;
    }

    public function realizarCheckin(): void {
        // Verifica se o voo está cheio.
        if ($this->voo->isVooCheio()) {
            echo "Não é possível realizar o check-in: o voo está cheio.\n";
            return;
        }

        // Verifica se ainda está no prazo para fazer check-in.
        if (!$this->voo->podeFazerCheckin()) {
            echo "Não é possível realizar o check-in: período de check-in encerrado.\n";
            return;
        }

        // Verifica se a passagem é válida para o voo.
        if (!$this->passageiro->getPassagem()->isValidaParaVoo($this->voo)) {
            echo "Não é possível realizar o check-in: a passagem não é válida para este voo.\n";
            return;
        }

        // Se passar por todas as verificações, realiza o check-in.
        $this->status = true;
        $this->voo->adicionarPassageiro($this->passageiro);
        echo "Check-in realizado com sucesso para o passageiro " . $this->passageiro->getNome() . " no voo " . $this->voo->getId() . ".\n";
    }

    public function cancelarCheckin(): void {
        if ($this->status) {
            $this->status = false;
            echo "Check-in cancelado para o passageiro " . $this->passageiro->getNome() . ".\n";
        } else {
            echo "Não foi possível cancelar o check-in: nenhum check-in ativo para o passageiro " . $this->passageiro->getNome() . ".\n";
        }
    }

}