<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="surname" required/>
    <input type="text" name="last_name"/>
    <input type="text" name="city" required/>
    <input type="text" name="phone" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Customer.php";

    $id=hexdec(uniqid());
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];

    $obj = new Customer();
    $objs = $obj->updateCustomer($id, $name, $last_name, $surname, $city, $phone);
?>