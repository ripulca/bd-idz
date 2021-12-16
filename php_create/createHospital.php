<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="address" required/>
    <input type="text" name="city" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "models/Hospital.php";

    $id=hexdec(uniqid());
    $name=$_POST['name'];
    $address=$_POST['address'];
    $city=$_POST['city'];

    $obj = new Hospital();
    $objs = $obj->addHospital($id, $name, $address, $city);
?>