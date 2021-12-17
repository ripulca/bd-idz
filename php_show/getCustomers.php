
<?php
    require_once "../models/Customer.php";

    $obj_o = new Customer();
    $objs = $obj_o->getAllCustomers();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['customer_code'] ?></p></td>
        <td><p>Фамилия: <?php echo $obj['customer_name'] ?></p></td>
        <td><p>Имя: <?php echo $obj['customer_surname'] ?></p></td>
        <td><p>Отчество: <?php echo $obj['customer_last_name'] ?></p></td>
        <td><p>Город: <?php echo $obj['customer_city']?></p></td>
        <td><p>Телефон: <?php echo $obj['customer_phone'] ?></p><br></td>
        </tr><br>
    <form method="post" action="../php/Customer.php">
        <input type="text" name="id" value="<?=$obj['customer_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireCustomer($obj_o['courier_code']);?>"></input>
<?php endforeach;?>