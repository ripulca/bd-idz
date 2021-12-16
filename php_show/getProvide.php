
<?php
    require_once "../models/Provide.php";

    $obj = new Provide();
    $objs = $obj->getAllProvider();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код поставщика: <?php echo $obj['provider_code']?></p>
    <p>Код лекарства: <?php echo $obj['medicine_code']?></p>
    <p>Сколько в наличии: <?php echo $obj['how_much_in_stock']?></p>
<?php endforeach;?>