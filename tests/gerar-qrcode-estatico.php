<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config-pix.php';

use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

//INSTANCIA PRINCIPAL DO PAYLOAD PIX
$obPayload = (new Payload)->setPixKey(47906899806)
                          ->setDescription('Pagamento do pedido 123456')
                          ->setMerchantName(PIX_MERCHANT_NAME)
                          ->setMerchantCity(PIX_MERCHANT_CITY)
                          ->setAmount(0.1)
                          ->setTxid('CASINO2024');

//CÓDIGO DE PAGAMENTO PIX
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new QrCode($payloadQrCode);

//IMAGEM DO QRCODE
$image = (new Output\Png)->output($obQrCode,400);

?>

<h1>QR CODE ESTÁTICO DO PIX</h1>

<br>

<img src="data:image/png;base64, <?=base64_encode($image)?>">

<br><br>

Código pix:<br>
<strong><?=$payloadQrCode?></strong>

