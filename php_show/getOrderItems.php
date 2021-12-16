
<?php
    require_once "../models/OrderItem.php";

    $obj = new Order_item();
    $objs = $obj->getAllOrderItems();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['order_item_code']?></p>
    <p>Код заказа: <?php echo $obj['order_code']?></p>
    <p>Код лекарства: <?php echo $obj['medicine_code']?></p>
    <p>Код поставщика: <?php echo $obj['provider_code']?></p>
    <p>Количество: <?php echo $obj['order_item_amount']?></p>
    <p>Стоимость: <?php echo $obj['order_item_price']?></p>
<?php endforeach;?>