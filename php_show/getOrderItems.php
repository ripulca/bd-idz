
<?php
    require_once "models/Courier.php";

    $obj = new Courier();
    $objs = $obj->getAllCouriers();
?>

<?php foreach ($objs as $obj): ?>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
    <p> <?php echo $obj['']?></p>
<?php endforeach;?>