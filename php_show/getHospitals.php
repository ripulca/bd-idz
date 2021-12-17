
<?php
    require_once "../models/Hospital.php";

    $obj_o = new Hospital();
    $objs = $obj_o->getAllHospitals();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['hospital_code']?></p></td>
        <td><p>Название: <?php echo $obj['hospital_name']?></p></td>
        <td><p>Адрес: <?php echo $obj['hospital_address']?></p></td>
        <td><p>Город: <?php echo $obj['hospital_city']?></p></td>
        </tr><br>
    <form method="post" action="../php/Hospital.php">
        <input type="text" name="id" value="<?=$obj['hospital_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireHospital($obj_o['hospital_code']);?>"></input>
<?php endforeach;?>