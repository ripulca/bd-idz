
<?php
    require_once "../models/OrderItem.php";

    $obj_o = new Order_item();
    $objs = $obj_o->getAllOrderItems();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['order_item_code']?></p></td>
        <td><p>Код заказа: <?php echo $obj['order_code']?></p></td>
        <td><p>Код лекарства: <?php echo $obj['medicine_code']?></p></td>
        <td><p>Код поставщика: <?php echo $obj['provider_code']?></p></td>
        <td><p>Количество: <?php echo $obj['order_item_amount']?></p></td>
        <td><p>Стоимость: <?php echo $obj['order_item_price']?></p></td>
        </tr><br>
    <form method="post" action="../php/OrderItem.php">
        <input type="text" name="id" value="<?=$obj['order_item_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireOrderItem($obj_o['order_item_code']);?>"></input>
<?php endforeach;?>