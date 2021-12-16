
<?php
    require_once "models/Courier.php";

    $obj = new Courier();
    $objs = $obj->getAllCouriers();
?>

<?php foreach ($objs as $obj): ?>
    <p></p>
<?php endforeach;?>