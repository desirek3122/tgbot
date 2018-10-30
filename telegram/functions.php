<?php
function teleToLog($log) {
  $myFile = 'log.txt';
  $fh = fopen($myFile, 'a') or die('can\'t open file');
  if ((is_array($log)) || (is_object($log))) {
    $updateArray = print_r($log, TRUE);
    fwrite($fh, $updateArray."\n");
  } else {
    fwrite($fh, $log . "\n");
  }
  fclose($fh);
}

function getUserRequest($text, $chat_id) {
  $hello = array();
  $hello[] = '/start';


  $bot_hello = array();
  $bot_hello[] = 'Какое сообщество будем подключать? Отправь ссылку!';


  if (in_array(mb_strtolower($text), $hello)) {
    //пользователь поздоровался.
    //случайная фраза привет от бота
    $bot_resp = $bot_hello[0];
    $data = array(
      'text' => $bot_resp,
      'chat_id' => $chat_id,
    );
    requestToTelegram($data);
  }


}


function requestToTelegram($data, $type = 'sendMessage') {

  $prxy = 'http://95.110.228.190:8975'; // адрес:порт прокси
  $prxy_auth = 'auth_user:auth_pass';       // логин:пароль для аутентификации
  /****************/
  $ch  = curl_init();
  $url = "https://api.telegram.org/bot789549053:AAGRPbH-26lnlNooZpyMvJUT_5OZU6jh2bo/sendMessage?chat_id=" . $data['chat_id'] . "&text=" . $data['text']; // где XXXXX - ваши значения
  curl_setopt_array ($ch, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true));
  /********************* Код для подключения к прокси *********************/
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);  // тип прокси
      curl_setopt($ch, CURLOPT_PROXY,  $prxy);                 // ip, port прокси
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, $prxy_auth);  // авторизация на прокси
      curl_setopt($ch, CURLOPT_HEADER, false);                // отключение передачи заголовков в запросе
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            // возврат результата в качестве строки
      curl_setopt($ch, CURLOPT_POST, 1);                      // использование простого HTTP POST
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        // отмена проверки сертификата удаленным сервером
  /***********************************************************************/
  $result = curl_exec($ch);  // DIGITAL RESISTANCE!
  print_r($result);
  curl_close($ch);


}
?>
