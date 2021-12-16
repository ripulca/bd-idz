
<?php
    require_once "../models/Customer.php";

    $obj = new Customer();
    $objs = $obj->getAllCustomers();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['customer_code'] ?></p>
    <p>Фамилия: <?php echo $obj['customer_name'] ?></p>
    <p>Имя: <?php echo $obj['customer_surname'] ?></p>
    <p>Отчество: <?php echo $obj['customer_last_name'] ?></p>
    <p>Город: <?php echo $obj['customer_city']?></p>
    <p>Телефон: <?php echo $obj['customer_phone'] ?></p><br>
<?php endforeach;?>