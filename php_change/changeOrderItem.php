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

    $id=hexdec(uniqid());
    $order_id=$_POST['order_id'];
    $medicine_id=$_POST['medicine_id'];
    $provider_id=$_POST['provider_id'];
    $order_item_amount=$_POST['order_item_amount'];
    $price=$_POST['price'];

    $obj = new Order_item();
    $objs = $obj->updateOrderItem($id, $order_id, $medicine_id, $provider_id, $order_item_amount, $price);
?>