<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="updateress" required/>
    <input type="text" name="city" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Hospital.php";

    $id=hexdec(uniqid());
    $name=$_POST['name'];
    $updateress=$_POST['updateress'];
    $city=$_POST['city'];

    $obj = new Hospital();
    $objs = $obj->updateHospital($id, $name, $updateress, $city);
?>