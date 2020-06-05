<?php
require 'vendor/autoload.php';
//實作HTTP 客戶端
$client = new \GuzzleHttp\Client();
//開啟並迭代CSV
$csv = \League\Csv\Reader::createFromPath($argv[1]);

foreach ($csv as $csvRow) {
    try {
        $httpResponse = $client->option($csvRow[0]);
        if ($httpResponse->getStatusCode() >= 400) {
            throw new \Exception();
        }
    } catch (\Exception $e) {
        echo $csvRow[0].PHP_EOL;
    }
}
