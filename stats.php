<?php
include('vendor/autoload.php');
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$client = new CoinGeckoClient();

$data = $client->ping();
$data = $client->simple()->getPrice('bitcoin', 'usd');

$client = new GuzzleHttp\Client();

$btcPrice = (int) $data['bitcoin']['usd'];
$btcRounded = $btcPrice;

if ($btcRounded > 999 && $btcRounded <= 999999) {
    $btcRounded = floor($btcRounded / 1000) . '<small>k</small>';
} elseif ($btcRounded > 999999) {
    $btcRounded = floor($btcRounded / 1000000) . '<small>m</small>';
}

$btcStat = [$btcPrice , $btcRounded];

// ETB
$etbRes = $client->request('GET', 'https://v6.exchangerate-api.com/v6/28295cbe80b4d1c842abf16d/pair/USD/ETB');
$etbPrice = json_decode($etbRes->getBody()->getContents())->conversion_rate;