
<?php
    require_once "../models/Doctor.php";

    $obj_o = new Doctor();
    $objs = $obj_o->getAllDoctors();
?>

<?php foreach ($objs as $obj): ?>
    <tr>
        <td><p>Код: <?php echo $obj['doctor_code']?></p></td>
        <td><p>Код больницы: <?php echo $obj['hospital_code']?></p></td>
        <td><p>Фамилия: <?php echo $obj['doctor_name']?></p></td>
        <td><p>Имя: <?php echo $obj['doctor_surname']?></p></td>
        <td><p>Отчество: <?php echo $obj['doctor_last_name']?></p></td>
        <td><p>Пост: <?php echo $obj['doctor_post']?></p></td>
        <td><p>Телефон: <?php echo $obj['doctor_phone']?></p></td>
        <td><p>Специализация: <?php echo $obj['doctor_specialization']?></p></td>
        </tr><br>
    <form method="post" action="../php/Doctor.php">
        <input type="text" name="id" value="<?=$obj['doctor_code']?>" hidden/>
        <button type="submit">Изменить</button>
    </form>
    <input type="button" value="Удалить" onclick="<?php //$obj->fireDoctor($obj_o['doctor_code']);?>"></input>
<?php endforeach;?>