
<?php
    require_once "../models/Courier.php";

    $obj_o = new Courier();
    $objs = $obj_o->getAllCouriers();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['courier_code'] ?></p></td>
        <td><p>Фамилия: <?php echo $obj['courier_name'] ?></p></td>
        <td><p>Имя: <?php echo $obj['courier_surname'] ?></p></td>
        <td><p>Отчество: <?php echo $obj['courier_last_name'] ?></p></td>
        <td><p>Город: <?php echo $obj['courier_city'] ?></p></td>
    </tr><br>
    <form method="post" action="../php/Courier.php">
        <input type="text" name="id" value="<?=$obj['courier_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireCourier($obj_o['courier_code']);?>"></input>
<?php endforeach;?>