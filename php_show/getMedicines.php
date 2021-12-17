
<?php
    require_once "../models/Medicine.php";

    $obj_o = new Medicine();
    $objs = $obj_o->getAllmedicines();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['medicine_code']?></p></td>
        <td><p>Название: <?php echo $obj['medicine_name']?></p></td>
        <td><p>Цена: <?php echo $obj['medicine_price']?></p></td>
        <td><p>Состав: <?php echo $obj['medicine_composition']?></p></td>
        <td><p>Фармгруппа: <?php echo $obj['medicine_pharmgroup']?></p></td>
        <td><p>Показания: <?php echo $obj['medicine_indications']?></p></td>
        <td><p>Побочные эффекты: <?php echo $obj['medicine_side_effects']?></p></td>
        <td><p>Противопоказания: <?php echo $obj['medicine_contraindications']?></p></td>
        <td><p>Фамокологический эффект: <?php echo $obj['medicine_pharmachologic_effect']?></p></td>
        </tr><br>
    <form method="post" action="../php/Medicine.php">
        <input type="text" name="id" value="<?=$obj['medicine_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireMedicine($obj_o['medicine_code']);?>"></input>
<?php endforeach;?>