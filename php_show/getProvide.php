
<?php
    require_once "../models/Provide.php";

    $obj_o = new Provide();
    $objs = $obj_o->getAllProvide();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код поставщика: <?php echo $obj['provider_code']?></p></td>
        <td><p>Код лекарства: <?php echo $obj['medicine_code']?></p></td>
        <td><p>Сколько в наличии: <?php echo $obj['how_much_in_stock']?></p></td>
        </tr><br>
    <form method="post" action="../php/Provide.php">
        <input type="text" name="id" value="<?=$obj['provider_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireProvide($obj_o['provider_code']);?>"></input>
<?php endforeach;?>