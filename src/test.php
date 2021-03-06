<?php

use Codinghuang\SwFastDFSClient\Client;
use Codinghuang\SwFastDFSClient\Error;

require '../vendor/autoload.php';

$config = [
    'host' => '127.0.0.1',
    'port' => 22122,
    'group' => 'wechat'
];
$client = new Client($config);
if (!$client->connect()) {
    print_r(Error::$errMsg . PHP_EOL);
    exit;
}

$remoteFileId = $client->uploadByFilename('test.txt');
if (!$remoteFileId) {
    print_r(Error::$errMsg . PHP_EOL);
    exit;
}
print_r($remoteFileId . PHP_EOL);

$res = $client->readFile($remoteFileId, 3, 3);
if (!$res) {
    print_r(Error::$errMsg . PHP_EOL);
    exit;
}
print_r($res);