<?php
//задаём наш токен, полученный при создании бота и указываем путь к API телеграма
define('BOT_TOKEN', '789549053:AAGRPbH-26lnlNooZpyMvJUT_5OZU6jh2bo');
define('API_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');

include_once './functions.php';

//принимаем запрос от бота(то что напишет в чате пользователь)
$content = file_get_contents('php://input');
//превращаем из json в массив
$update = json_decode($content, TRUE);
//получаем id чата
$chat_id = $update['message']['chat']['id'];

//получаем текст запроса
$text = $update['message']['text'];

//запись в лог
teleToLog($update);

//обработка запроса
getUserRequest($text, $chat_id);
?>
