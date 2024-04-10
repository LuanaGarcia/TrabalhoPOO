<?

class Bagagem {
  private float $peso;
  private int $bagagem;
  private Passageiro $passaeiro;

  public function __construct(float $peso, int $bagagem, Passageiro $passaeiro){
    $this->peso = $peso;
    $this->bagagem = $bagagem;
    $this->passaeiro = $passaeiro;
  }

  public function getPeso(): float {
    return $this->peso;
  }

	public function getBagagem(): int {
    return $this->bagagem;
  }

	public function getPassaeiro(): Passageiro {
    return $this->passaeiro;
  }

	public function setPeso(float $peso): void {
    $this->peso = $peso;
  }

	public function setBagagem(int $bagagem): void {
    $this->bagagem = $bagagem;
  }

	public function setPassaeiro(Passageiro $passaeiro): void {
    $this->passaeiro = $passaeiro;
  }

	
	


}