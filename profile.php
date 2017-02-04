<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('9t0g5+EDaF13gvDHFU9J0XQceLUGhPFsyoF1MfkR7xX3TDwEL3UNdffefZa1+POdZ6TnYgiF/wwc8XW6mjSaX9Eep9apSL35wcJMGXCN+w6no6kn8ZhsrYYvtS34cLa+qLIb3rArpOQAIsqc/WkwVgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);
$response = $bot->getProfile('<userId>');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}
