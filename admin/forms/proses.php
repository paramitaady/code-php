<?php

if(!isset($_GET['phone'])){ die('Not enough data');}

$apiURL = 'https://eu59.chat-api.com/instance70039/';
$token =  'zorx1iby5nu0srrl';

$phone = $_GET['phone'];

$data = json_encode(array(
    'chatId'=>$phone.'@c.us',
    'body'=>'https://kampungrjb.000webhostapp.com/admin/tables/lampiran.php?id_laporan=21',
    'filename'=>'pC-TA-Format-ringkasan-TA-Informatika-UII-ieee.doc',
    'caption'=>'ini laporannya ya..'
));

$url = $apiURL.'sendFile?token='.$token;
$options = stream_context_create(['http' => [
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => $data
]
]);
$response = file_get_contents($url,false,$options);
echo $response; exit;

mysqli_close("koneksi.php");

?>
