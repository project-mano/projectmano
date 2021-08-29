<?php
include('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new GuzzleHttp\Client();

// BTC
$btcRes = $client->request('GET', 'https://www.cryptotradingapi.io/api/price/BTC/USD/BINANCE', [
            'headers' => [
                'x-access-token' => $_ENV['cryptotradingapiaccess'],
                'Content-Type' => 'application/json',
            ],
        ]);
$btcStats = json_decode($btcRes->getBody()->getContents());
$btcPrice = $btcStats->price;

if ($btcPrice > 999 && $btcPrice <= 999999) {
    $btcPrice = floor($btcPrice / 1000) . '<small>k</small>';
} elseif ($btcPrice > 999999) {
    $btcPrice = floor($btcPrice / 1000000) . '<small>m</small>';
}

$btcStat = [$btcStats->price , $btcPrice];

// ETB
$etbRes = $client->request('GET', 'https://v6.exchangerate-api.com/v6/28295cbe80b4d1c842abf16d/pair/USD/ETB');
$etbPrice = json_decode($etbRes->getBody()->getContents())->conversion_rate;