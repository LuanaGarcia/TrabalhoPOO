<?php

require_once 'Pessoa.php';
require_once 'Passageiro.php';
require_once 'Tripulacao.php';


$pessoa = new Pessoa('Juscelino','juscelino.costajr@grupointegrado.br');

$passageiro = new Passageiro('gol-1245', new Bagagem());
$passageiro->setNome('Camila');
$passageiro->setEmail('camila@grupointegrado.br');

echo "PESSOA:\n";
echo $pessoa->getNome() . "\n";
echo $pessoa->getEmail(). "\n";

echo "PASSAGEIRO:\n";
echo $passageiro->getNome() . "\n";
echo $passageiro->getEmail() . "\n";
echo $passageiro->getIdentificador() . "\n";

$tripulante = new Tripulacao(
  'Hamilton',
  'hamilton@gol.com',
  13000,
  'Comte Hamilton'
);