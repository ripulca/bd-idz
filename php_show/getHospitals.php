
<?php
    require_once "../models/Hospital.php";

    $obj = new Hospital();
    $objs = $obj->getAllHospitals();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['hospital_code']?></p>
    <p>Название: <?php echo $obj['hospital_name']?></p>
    <p>Адрес: <?php echo $obj['hospital_address']?></p>
    <p>Город: <?php echo $obj['hospital_city']?></p>
<?php endforeach;?>