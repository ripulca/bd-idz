
<?php
    require_once "models/Hospital.php";

    $obj = new Hospital();
    $objs = $obj->getAllHospitals();
?>

<?php foreach ($objs as $obj): ?>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
<?php endforeach;?>