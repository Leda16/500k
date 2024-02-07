<?php

$url = 'https://sacola.magazineluiza.com.br/customer/login/';
$data = json_encode([
    "login" => "arturgallucci1@gmail.com",
    "password" => "12512",
    "channel" => "magazineluiza",
    "captcha_token" => "09ADVlMi_sf3B1Rwmq9c5o1cT8L_b5JaJmKqOF9qSVxQFq7pN65hj30NjvcMn_ufjUYoOqvVXhHy9zWdFMxC7lF8r1bEBUZvCss-uMlw",
]);

$headers = [
    "authority: sacola.magazineluiza.com.br",
    "accept: */*",
    "accept-language: en-US,en;q=0.9",
    "content-type: application/json",
    // Inclua todos os outros cabeçalhos necessários
    "origin: https://sacola.magazineluiza.com.br",
    "referer: https://sacola.magazineluiza.com.br/",
    // Pode ser necessário configurar o User-Agent para corresponder ao da requisição original
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 OPR/106.0.0.0",
    // A inclusão dos cookies deve ser feita com cuidado, garantindo que não infrinja nenhuma política
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Desabilita a verificação de SSL para ambientes de desenvolvimento/testes
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Erro na requisição: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);