
<?php
    require_once "models/Order.php";

    $obj = new Order();
    $objs = $obj->getAllOrders();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['order_code']?></p>
    <p>Код покупателя: <?php echo $obj['customer_code']?></p>
    <p>Код врача: <?php echo $obj['doctor_code']?></p>
    <p>Код курьера: <?php echo $obj['courier_code']?></p>
    <p>Дата доставки: <?php echo $obj['order_end_date']?></p>
    <p>Дата оплаты: <?php echo $obj['order_pay_date']?></p>
    <p>Скидка: <?php echo $obj['order_discount']?></p>
    <p>Адрес доставки: <?php echo $obj['order_delivery_address']?></p>
<?php endforeach;?>