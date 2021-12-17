
<?php
    require_once "../models/Courier.php";

    $obj_o = new Courier();
    $objs = $obj_o->getAllCouriers();
?>
<a href="/models/report_cr.php" />Отчет Покупатель-Заказ</a>
<?php foreach ($objs as $obj): ?>
        Код: <?php echo $obj['courier_code'] ?>
        Фамилия: <?php echo $obj['courier_name'] ?>
        Имя: <?php echo $obj['courier_surname'] ?>
        Отчество: <?php echo $obj['courier_last_name'] ?>
        Город: <?php echo $obj['courier_city'] ?>
    </tr><br>
    <form method="post" action="../php/Courier.php">
        <input type="text" name="id" hidden/>
        <button type="submit">Создать</button>
    </form>
    <form method="post" action="../php/Courier.php">
        <input type="text" name="id" value="<?=$obj['courier_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireCourier($obj_o['courier_code']);?>"></input>
<?php endforeach;?>