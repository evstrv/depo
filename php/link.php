<?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'depo';    // Имя созданного вами пользователя
    $pass = 'Tdcnhfnjd22'; // Установленный вами пароль пользователю
    $db_name = 'deporazbor';   // Имя базы данных

    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
	mysqli_set_charset($link, "utf8");

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
        echo 'Не могу соединиться с базой. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
    }
    else
    {
        // echo 'Подключена<br>';
    }
?>