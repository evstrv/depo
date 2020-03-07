<?php
    require_once ('link.php');
    $limit = $_POST['limit'];
    $query = mysqli_query($link,"SELECT * FROM cat LIMIT $limit, 12");
    if(mysqli_num_rows($query) == NULL) {
        echo ('null');
        die;
    }
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
                                <div>Наименование: '.$result['name'].'</div>
                            </div>
                        </article>';
    }
    echo $data_product;
    die;
?>