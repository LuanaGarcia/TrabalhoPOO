<?php
//Classe triplacao herda de pessoa
class Tripulacao extends Pessoa{
  protected float $salario;
  protected string $alcunha;

  public function __construct(string $nome, string $email, float $salario, string $alcunha) {
    $this->salario = $salario;
    $this-> alcunha = $alcunha;
    //referenciando nome e e-mail da classe pessoa
    parent :: setNome($nome);
    parent :: setEmail($email);
  }

  //Metodos de acesso - Getters e Setters
  public function getSalario() : float {
    return $this-> salario;
  }

  public function getAlcunha() : string {
    return $this-> alcunha;
  }

  public function setSalario(float $salario) : void {
    $this-> salario = $salario;
  }

  public function setAlcunha(string $alcunha) : void {
    $this-> alcunha = $alcunha;
  }

  public function trabalhar () : string {
    return 'O tripulante trabalha no vôo';
  }
}