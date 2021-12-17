
<?php
    require_once "../models/Provider.php";

    $obj_o = new Provider();
    $objs = $obj_o->getAllProviders();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['provider_code']?></p></td>
        <td><p>Название: <?php echo $obj['provider_name']?></p></td>
        <td><p>Телефон: <?php echo $obj['provider_phone']?></p></td>
        <td><p>Город: <?php echo $obj['provider_city']?></p></td>
        <td><p>Адрес: <?php echo $obj['provider_adderss']?></p></td>
        </tr><br>
    <form method="post" action="../php/Provider.php">
        <input type="text" name="id" value="<?=$obj['provider_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireProvider($obj_o['provider_code']);?>"></input>
<?php endforeach;?>