
<?php
    require_once "models/Courier.php";

    $obj = new Courier();
    $objs = $obj->getAllCouriers();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['courier_code'] ?></p>
    <p>Фамилия: <?php echo $obj['courier_name'] ?></p>
    <p>Имя: <?php echo $obj['courier_surname'] ?></p>
    <p>Отчество: <?php echo $obj['courier_last_name'] ?></p>
    <p>Город: <?php echo $obj['courier_city'] ?></p><br>
<?php endforeach;?>