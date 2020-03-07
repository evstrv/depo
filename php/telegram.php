<?php
// var_dump($_POST);

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
 
//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_theme'];
 
//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "646656893:AAFdw83B18gpvjIeQg9JZo1_B-athi1-1dc";
 
//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-1001418755093";
 
//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Описание: ' => $email
);
 
//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
 
//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
?>