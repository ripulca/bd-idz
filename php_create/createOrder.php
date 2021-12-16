<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="customer_id" required/>
    <input type="number" name="doctor_id"/>
    <input type="number" name="courier_id"/>
    <input type="date" name="order_end_date" required/>
    <input type="date" name="order_pay_date" required/>
    <input type="text" name="order_discount" required/>
    <input type="text" name="order_delivery_address" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "models/Order.php";

    $id=hexdec(uniqid());
    $customer_id=$_POST['customer_id'];
    $doctor_id=$_POST['doctor_id'];
    $courier_id=$_POST['courier_id'];
    $end_date=$_POST['order_end_date'];
    $pay_date=$_POST['order_pay_date'];
    $discount=$_POST['order_discount'];
    $delivery_address=$_POST['order_delivery_address'];

    $obj = new Order();
    $objs = $obj->addOrder($id, $customer_id, $doctor_id, $courier_id, $end_date, $pay_date, $discount, $delivery_address);
?>