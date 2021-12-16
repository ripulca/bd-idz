<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="phone"/>
    <input type="text" name="city" required/>
    <input type="text" name="updateerss"/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Provider.php";

    $id=hexdec(uniqid());
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $updateerss=$_POST['updateerss'];
    $city=$_POST['city'];

    $obj = new Provider();
    $objs = $obj->updateProvider($id, $name, $phone, $city, $updateerss);
?>