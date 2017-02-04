<?php

$access_token = '9t0g5+EDaF13gvDHFU9J0XQceLUGhPFsyoF1MfkR7xX3TDwEL3UNdffefZa1+POdZ6TnYgiF/wwc8XW6mjSaX9Eep9apSL35wcJMGXCN+w6no6kn8ZhsrYYvtS34cLa+qLIb3rArpOQAIsqc/WkwVgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            //$text = $event['message']['text'];
            // Get replyToken
            $userID = $event['source']['userId'];
            $replyToken = $event['replyToken'];

            if ($event['message']['text'] == 'สวัสดี') {
                //check user display
                $urlprofile = 'https://api.line.me/v2/bot/profile/U9d261d005044ab0f2cba21b69278a155';

                $headersprofile = array('Authorization: Bearer ' . $access_token);

                $ch = curl_init($urlprofile);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headersprofile);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);
                //Parse Json to Array
                $profile = json_decode($result, true);                

                // Build message to reply back
                $messages = [
                    'type' => 'text',
                    'text' => 'สวัสดีครับ ผม Next ครับ พี่ ' . $profile['displayName']
                ];

                // Make a POST Request to Messaging API to reply to sender
                $url = 'https://api.line.me/v2/bot/message/reply';
                $data = [
                    'replyToken' => $replyToken,
                    'messages' => [$messages],
                ];
            }

            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result . "\r\n";
        }
    }
}
echo "OK";
