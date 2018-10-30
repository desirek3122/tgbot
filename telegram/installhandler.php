<?php
include('ssocks5.php');


 $token = '789549053:AAGRPbH-26lnlNooZpyMvJUT_5OZU6jh2bo';
 $url = "https://api.telegram.org/bot" . $token . "/setWebhook?url=https://www.zh1sheng.site/telegram/handler.php";

 send($url);
?>
