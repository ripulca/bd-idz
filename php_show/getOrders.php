
<?php
    require_once "../models/Order.php";

    $obj_o = new Order();
    $objs = $obj_o->getAllOrders();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['order_code']?></p></td>
        <td><p>Код покупателя: <?php echo $obj['customer_code']?></p></td>
        <td><p>Код врача: <?php echo $obj['doctor_code']?></p></td>
        <td><p>Код курьера: <?php echo $obj['courier_code']?></p></td>
        <td><p>Дата доставки: <?php echo $obj['order_end_date']?></p></td>
        <td><p>Дата оплаты: <?php echo $obj['order_pay_date']?></p></td>
        <td><p>Скидка: <?php echo $obj['order_discount']?></p></td>
        <td><p>Адрес доставки: <?php echo $obj['order_delivery_address']?></p></td>
        </tr><br>
    <form method="post" action="../php/Order.php">
        <input type="text" name="id" value="<?=$obj['order_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireOrder($obj_o['order_code']);?>"></input>
<?php endforeach;?>