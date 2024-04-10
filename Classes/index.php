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

// Criando um objeto Piloto
$cidade = new Cidade("Base do Piloto", "Estado do Piloto", Porte::JATO_GRANDE_PORTE);
$piloto = new Piloto('John Clemente', 'john.clemente@example.com', 1000, 'Capitão John', 1000, $aeronave, $cidade);

// Criando um objeto Comissario
$comissario = new Comissario('Rachel Smith', 'Rachel.smith@example.com', 3000, 'Sra. Smith', ['Inglês', 'Espanhol'], true, 5);

// Adicionando o piloto e o comissário à tripulação do voo
$voo->adicionarTripulante($piloto);
$voo->adicionarTripulante($comissario);

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

echo "\nInformações do Piloto:\n";
echo "Nome: " . $piloto->getNome() . "\n";
echo "Email: " . $piloto->getEmail() . "\n";
echo "Horas de Voo: " . $piloto->getHorasVoo() . "\n";
echo "Tipo de Aeronave: " . $piloto->getTipoAeronave()->getModelo() . "\n";
echo "Base de Operação: " . $piloto->getBaseOperacao()->getNome() . "\n";

echo "\nInformações do Comissário:\n";
echo "Nome: " . $comissario->getNome() . "\n";
echo "Email: " . $comissario->getEmail() . "\n";
echo "Idiomas: " . implode(", ", $comissario->getIdiomas()) . "\n";
echo "Treinamento de Emergência: " . ($comissario->getTreinamentoEmergencia() ? "Sim" : "Não") . "\n";
echo "Anos de Experiência: " . $comissario->getAnosExperiencia() . "\n";

?>

<html>

<head>
    <title>Integrated Airlines - Luana Garcia</title>
</head>

<body>
    <h2>Aeronave</h2>
    <p><strong>Modelo: </strong> <?= $aeronave->getModelo() ?></p>
    <p><strong>Capacidade: </strong><?= $aeronave->getCapacidade() ?></p>
    <strong>Status: </strong> <?= $aeronave->getStatus() ?>

    <h2>Tripulação</h2>
    <h3>Piloto: </h3>
    <p><strong>Nome: </strong> <?= $piloto->getNome() ?></p>
    <p><strong>Horas de Vôo: </strong> <?= $piloto->getHorasVoo() ?></p>

    <h3>Comissario: </h3>
    <p><strong>Comissario: </strong><?= $comissario->getNome() ?></p>
    <p><strong>Anos de Experiencia: </strong> <?= $comissario->getAnosExperiencia() ?></p>


</body>

</html>