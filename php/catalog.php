<?php
    require_once ('link.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="yandex-verification" content="09ad717478d50d7b" />

    
    <link rel="stylesheet" href="../js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

    <link rel="shortcut icon" href="/images/car.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/catalog.css">

    <title>Разборка Land Rover Rander Rover Vogue и Range Rover Sport – Каталог</title>
</head>

<body>
    <header>
        <div class="header">
            <img src="../images/logo/lr-logo.png" alt="logo">
            <div class="burger-container">
                <div class="burger-items item-1"></div>
                <div class="burger-items item-2"></div>
                <div class="burger-items item-3"></div>
            </div>
            <nav>
                <a href="../index.html">Главная</a>
                <a href="../index.html#about-us">О нас</a>
                <a href="catalog.php">Каталог</a>
                <a href="../index.html#feedback">Обратная связь</a>
                <a href="#contacts">Контакты</a>
            </nav>
            <div class="black-mobile">
                <nav>
                    <a href="../index.html">Главная</a>
                    <a href="../index.html#about-us">О нас</a>
                    <a href="catalog.php">Каталог</a>
                    <a href="../index.html#feedback">Обратная связь</a>
                    <a href="#contacts">Контакты</a>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="search">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Поиск" required>
                <input type="submit" name="submit" value="Найти">
            </form>
            <?php
                $limit = 12;   

                $query = mysqli_query($link,"SELECT * FROM cat LIMIT $limit");

                $data_product = '';

                while ($result = mysqli_fetch_array($query)) {
                    $data_product.= '
                                    <article class="data">
                                        <a id="image" href="../images/details/'.$result['img'].'" >
                                            <img src="../images/details/'.$result['img'].'" alt="'.$result['img'].'" style="object-fit: cover; width: 175px; height: 175px; border-radius: 2px;">
                                        </a>
                                        <div>'.$result['id'].'. Марка: '.$result['mark'].'</div>
                                        <div>Номер(а) детали: '.$result['num_detail'].'</div>
                                        <div>Наименование: '.$result['name'].'</div>
                                        <div>В наличии: '.$result['quantity'].'</div>
                                        <div>Цена: '.$result['price'].' руб.</div>
                                        <button>Подробнее</button>
                                        <div class="more">
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                            <div>Описание: здесь должно находиться подробное описание этого блока, что в нем содержится и на что может заменяться</div>
                                        </div>
                                    </article>';    
                }
            ?>
            <?php
                $data = '';

                $search = '';

                if(isset($_GET['search'])) {
                    $search = $_GET['search'];
                }

                $query = mysqli_query($link,"SELECT * FROM cat WHERE name LIKE '%$search%' OR id = '$search' OR num_detail = '$search'");

                while ($result = mysqli_fetch_array($query)) {
                            $data.= '
                                    <article class="data">
                                        <a id="image" href="../images/details/'.$result['img'].'" >
                                            <img src="../images/details/'.$result['img'].'" alt="'.$result['img'].'" style="object-fit: cover; width: 175px; height: 175px; border-radius: 2px;">
                                        </a>
                                        <div>'.$result['id'].'. Марка: '.$result['mark'].'</div>
                                        <div>Номер(а) детали: '.$result['num_detail'].'</div>
                                        <div>Наименование: '.$result['name'].'</div>
                                        <div>В наличии: '.$result['quantity'].'</div>
                                        <div>Цена: '.$result['price'].' руб.</div>
                                        <button>Подробнее</button>
                                        <div class="more">
                                            <div>Наименование: '.$result['name'].'</div>
                                        </div>
                                    </article>';  
                        }
            ?>
        </section>
        <section class="results">
            <div class="data_ajax">
                <?php
                    if(isset($_GET['search'])) {
                        echo $data;
                    }
                    else{
                        echo $data_product;
                    }
                ?>
            </div>
        </section>
        <section class="more">
            <div>
                <?php
                    if(!isset($_GET['search'])) {
                        echo '<button id="add" onclick="add()">Показать еще</button>';
                    } 
                ?>
            </div>
        </section>
    </main>
    <footer>
        <section id="contacts" class="contacts">
            <article>
                <span>Наши контакты:</span>
                <span id="first">
                    <address>Москва, Спартаковская пл., 1/7 строение 5</address>
                </span>
                <span id="second">
                    <address>Москва, ул. Косинская, д. 10</address>
                </span>
                <span id="third">
                    <address>Москва, ул. Верейская, д. 13</address>
                </span>
                <span>Тел.: <a href="tel: +7 (977) 669-74-21">+7 (977) 669-74-21</a></span>
                <span><a href="tel: +7 (901) 506-84-39">+7 (901) 506-84-39</a></span>
                <span>Время работы: без выходных с 11:00 до 20:00</span>
                <div class="icons">
                    <!-- <img src="../images/logo/vk-logo.webp" alt="vk"> -->
                    <!-- <img src="../images/logo/facebook-logo.webp" alt="facebook">
                    <img src="../images/logo/odnoklassniki-logo.webp" alt="odnoklassniki">-->
                    <!-- <img src="../images/logo/instagram-logo.webp" alt="instagram">
                    <img src="../images/logo/youtube.png" alt="youtube"> -->
                    <a href="whatsapp://send?phone=+7(977)6697421"><img src="../images/logo/whatsapp-logo.webp"
                            alt="whatsapp"></a>
                    <!-- <img src="../images/logo/telegram-logo.webp" alt="telegram"> -->
                </div>
            </article>
            <div class="map">
                <iframe class="first"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A1bbbdaf69a5db3088cc0e2db71c22f5ea68ded80b6da1ca089607a390fe99788&amp;source=constructor"
                    width="100%" height="100%" frameborder="0"></iframe>
                <iframe class="second"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A1c272e8361afb715290302b0628760b9ba4f05da2b9a73adcb336e88ad89ef4b&amp;source=constructor"
                    width="100%" height="100%" frameborder="0"></iframe>
                <iframe class="third"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae4f90e220bd89e41ab7974701e3ae6041edcf9add4292489f61f681fc4fe8821&amp;source=constructor" 
                    width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </section>
    </footer>
</body>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script src="../js/main.js"></script>

</html>