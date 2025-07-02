<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Promise;

/**
 * Esta função agora faz o processo COMPLETO de login de forma assíncrona.
 * Ela cria seu próprio cliente para garantir que a sessão seja 100% isolada.
 *
 * @param string $email O email do usuário.
 * @param string $password A senha do usuário.
 * @return \GuzzleHttp\Promise\PromiseInterface
 */
function fazerLoginCompletoAsync(string $email, string $password): Promise\PromiseInterface {
    // Cada chamada a esta função cria um cliente e um cookie jar novos e isolados.
    $client = new Client([
        'base_uri' => 'http://localhost:8765',
        'cookies' => new CookieJar(),
        'timeout' => 30.0,
        // Adicionamos um header para simular um navegador real
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]
    ]);

    // O resto da lógica é a mesma: pega o token e depois faz o login
    $promiseGet = $client->requestAsync('GET', '/users/login');

    return $promiseGet->then(function ($response) use ($client, $email, $password) {
        $html = (string) $response->getBody();
        preg_match('/<input type="hidden" name="_csrfToken" value="(.*?)"/', $html, $matches);
        
        if (!isset($matches[1])) {
            throw new \Exception("Token CSRF não encontrado para $email.");
        }
        $csrfToken = $matches[1];

        return $client->requestAsync('POST', '/users/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password,
                '_csrfToken' => $csrfToken
            ]
        ]);
    });
}

// --- BLOCO DE EXECUÇÃO PRINCIPAL ---

$usuarios = [
    ['email' => 'vamostestar@gmail.com', 'password' => '123456'],
    ['email' => 'thigas1234@gmail.com',  'password' => '123456'],
    ['email' => 'ivan.js23silva@gmail.com', 'password' => '123456'],
];

// COMECE COM UM NÚMERO MENOR PARA TESTAR!
$fatorDeRepeticao = 5; // Total de 3 * 5 = 15 requisições simultâneas
$listaDeTarefas = [];
for ($i = 0; $i < $fatorDeRepeticao; $i++) {
    $listaDeTarefas = array_merge($listaDeTarefas, $usuarios);
}
$totalRequisicoes = count($listaDeTarefas);

echo "Preparando $totalRequisicoes requisições de login para execução em paralelo...\n";

$promises = [];
foreach ($listaDeTarefas as $index => $tarefa) {
    $promises[$index] = fazerLoginCompletoAsync($tarefa['email'], $tarefa['password']);
}

$resultados = Promise\Utils::settle($promises)->wait();

$sucessos = 0;
$falhas = 0;

echo "\n--- Resultados ---\n";
foreach ($resultados as $index => $resultado) {
    $email = $listaDeTarefas[$index]['email'];
    if ($resultado['state'] === 'fulfilled' && $resultado['value']->getStatusCode() == 200) {
        $sucessos++;
    } else {
        $falhas++;
    }
}

echo "\n--- Resumo Final ---\n";
echo "Total de Requisições: $totalRequisicoes\n";
echo "Sucessos: $sucessos\n";
echo "Falhas: $falhas\n";
echo "Teste de carga finalizado.\n";

?>