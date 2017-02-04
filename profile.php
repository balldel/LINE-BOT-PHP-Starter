<?php

$access_token = '9t0g5+EDaF13gvDHFU9J0XQceLUGhPFsyoF1MfkR7xX3TDwEL3UNdffefZa1+POdZ6TnYgiF/wwc8XW6mjSaX9Eep9apSL35wcJMGXCN+w6no6kn8ZhsrYYvtS34cLa+qLIb3rArpOQAIsqc/WkwVgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v2/bot/profile/U9d261d005044ab0f2cba21b69278a155';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result['displayName'];

