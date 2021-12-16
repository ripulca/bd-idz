
<?php
    require_once "models/Medicine.php";

    $obj = new Medicine();
    $objs = $obj->getAllmedicines();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['medicine_code']?></p>
    <p>Название: <?php echo $obj['medicine_name']?></p>
    <p>Цена: <?php echo $obj['medicine_price']?></p>
    <p>Состав: <?php echo $obj['medicine_composition']?></p>
    <p>Фармгруппа: <?php echo $obj['medicine_pharmgroup']?></p>
    <p>Показания: <?php echo $obj['medicine_indications']?></p>
    <p>Побочные эффекты: <?php echo $obj['medicine_side_effects']?></p>
    <p>Противопоказания: <?php echo $obj['medicine_contraindications']?></p>
    <p>Фамокологический эффект: <?php echo $obj['medicine_pharmachologic_effect']?></p>
<?php endforeach;?>