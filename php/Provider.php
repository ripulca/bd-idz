<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="phone"/>
    <input type="text" name="city" required/>
    <input type="text" name="adderss"/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Provid_newer.php";

    $id_new=hexdec(uniqid_new());
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adderss=$_POST['adderss'];
    $city=$_POST['city'];

    $obj = new Provid_newer();
    $objs = $obj->addProvid_newer($id_new, $name, $phone, $city, $adderss);
?>