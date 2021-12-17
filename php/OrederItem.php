<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="order_id_new" required/>
    <input type="number" name="medicine_id_new" required/>
    <input type="number" name="provid_newer_id_new" required/>
    <input type="number" name="order_item_amount" required/>
    <input type="number" name="price" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Order_item.php";

    $id_new=hexdec(uniqid_new());
    $order_id_new=$_POST['order_id_new'];
    $medicine_id_new=$_POST['medicine_id_new'];
    $provid_newer_id_new=$_POST['provid_newer_id_new'];
    $order_item_amount=$_POST['order_item_amount'];
    $price=$_POST['price'];

    $obj = new Order_item();
    $objs = $obj->addOrderItem($id_new, $order_id_new, $medicine_id_new, $provid_newer_id_new, $order_item_amount, $price);
?>