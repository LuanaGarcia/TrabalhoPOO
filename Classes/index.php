<?php

require_once 'Aeronave.php';
require_once 'Aeroporto.php';
require_once 'Bagagem.php';
require_once 'Checkin.php';
require_once 'Cidade.php';
require_once 'Comissario.php';
require_once 'Passageiro.php';
require_once 'Passagem.php';
require_once 'Pessoa.php';
require_once 'Piloto.php';
require_once 'Porte.php';
require_once 'Tripulacao.php';
require_once 'Voo.php';

// Criando instâncias de objetos para simular o sistema
$aeronave = new Aeronave("Boeing 737", 200, "Livre"); // Modelo, capacidade, status
$aeroportoOrigem = new Aeroporto("Aeroporto Internacional de Guarulhos", new Cidade("Guarulhos", "São Paulo", Porte::JATO_GRANDE_PORTE), "GRU", 2, 1, Porte::JATO_GRANDE_PORTE, []);
$aeroportoDestino = new Aeroporto("Aeroporto Internacional do Galeão", new Cidade("Rio de Janeiro", "Rio de Janeiro", Porte::JATO_GRANDE_PORTE), "GIG", 2, 1, Porte::JATO_GRANDE_PORTE, []);

// Criando um objeto Voo
$dataHoraPartida = new DateTime('2024-04-15 10:00:00');
$voo = new Voo("VOO123", $aeroportoOrigem, $aeroportoDestino, $aeronave, $dataHoraPartida);

// Criando um objeto Passageiro com uma passagem válida
$passagem = new Passagem("PASS123", 299.99, $voo, new Passageiro("PAS123", null, null, new Pessoa("Nome do Passageiro", "passageiro@example.com")), new DateTime('2024-04-15 07:00:00'));

// Criando uma bagagem para o passageiro
$bagagem = new Bagagem(20.0, 1, $passagem->getPassageiro());

// Atribuindo a bagagem ao passageiro
$passagem->getPassageiro()->setBagagem($bagagem);

// Criando um check-in para o passageiro e o voo
$checkin = new Checkin($passagem->getPassageiro(), $voo);

// Realizando o check-in apenas se for válido
if ($checkin->realizarCheckin()) {
    echo "Realizando o check-in...\n";
} else {
    echo "\nNão é possível realizar o check-in. Passageiro ou passagem inválidos para este voo.\n";
}

// Exibindo passageiros no voo após o check-in
echo "\nPassageiros no voo após o check-in:\n";
foreach ($voo->getPassageiros() as $passageiro) {
    echo "- " . $passageiro->getIdentificador() . "\n";
}

