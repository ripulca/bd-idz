<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="order_id" required/>
    <input type="number" name="medicine_id" required/>
    <input type="number" name="provider_id" required/>
    <input type="number" name="order_item_amount" required/>
    <input type="number" name="price" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Order_item.php";

    $id_new=(int)uniqid();
    $order_id=$_POST['order_id'];
    $medicine_id=$_POST['medicine_id'];
    $provider_id=$_POST['provider_id'];
    $order_item_amount=$_POST['order_item_amount'];
    $price=$_POST['price'];

    $obj = new Order_item();
    // $objs = $obj->addOrderItem($id_new, $order_id_new, $medicine_id_new, $provid_newer_id_new, $order_item_amount, $price);
?>
<input type="button" value="Создать" onclick="<?php $obj->addDoctor($id_new, $order_id, $medicine_id, $provider_id, $order_item_amount, $price);?>"></input>
<input type="button" value="Изменить" onclick="<?php $obj->updateDoctor($id, $order_id, $medicine_id, $provider_id, $order_item_amount, $price);?>"></input>