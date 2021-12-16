
<?php
    require_once "../models/Provider.php";

    $obj = new Provider();
    $objs = $obj->getAllProviders();
?>

<?php foreach ($objs as $obj): ?>
    <p>Код: <?php echo $obj['provider_code']?></p>
    <p>Название: <?php echo $obj['provider_name']?></p>
    <p>Телефон: <?php echo $obj['provider_phone']?></p>
    <p>Город: <?php echo $obj['provider_city']?></p>
    <p>Адрес: <?php echo $obj['provider_adderss']?></p>
<?php endforeach;?>