
<?php
    require_once "../models/Doctor.php";

    $obj = new Doctor();
    $objs = $obj->getAllDoctors();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['doctor_code']?></p>
    <p>Код больницы: <?php echo $obj['hospital_code']?></p>
    <p>Фамилия: <?php echo $obj['doctor_name']?></p>
    <p>Имя: <?php echo $obj['doctor_surname']?></p>
    <p>Отчество: <?php echo $obj['doctor_last_name']?></p>
    <p>Пост: <?php echo $obj['doctor_post']?></p>
    <p>Телефон: <?php echo $obj['doctor_phone']?></p>
    <p>Специализация: <?php echo $obj['doctor_specialization']?></p>
<?php endforeach;?>