<?php
require_once 'Tripulacao.php';
require_once 'Aeronave.php';
require_once 'Cidade.php';
//Classe Piloto herda de Tripulacao
class Piloto extends Tripulacao{
  private int $horasVoo;
  private Aeronave $tipoAeronave;
  private Cidade $baseOperacao;

  public function __construct(int $horasVoo, Aeronave $tipoAeronave, Cidade $baseOperacao) {
    $this-> horasVoo = $horasVoo;
    $this-> tipoAeronave = $tipoAeronave;
    $this-> baseOperacao = $baseOperacao;
  }

  public function getHorasVoo() : int {
    return $this-> horasVoo;
  }

  public function getTipoAeronave () : Aeronave {
    return $this-> tipoAeronave;
  }

  public function getBaseOperacao() : Cidade {
    return $this-> baseOperacao;
  }

  public function setHorasVoo(int $horasVoo) : void {
    $this-> horasVoo = $horasVoo;
  }

  public function setTipoAeronave(Aeronave $tipoAeronave) : void {
    $this-> tipoAeronave = $tipoAeronave;
  }

  public function setBaseOperacao(Cidade $baseOperacao) : void {
    $this-> baseOperacao = $baseOperacao;
  }

  public function calcularTempoVoo() {
    
  }

    public function trabalhar(): string {
        return 'O piloto está preparando o voo.';
    }
}