<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="phone"/>
    <input type="text" name="city" required/>
    <input type="text" name="adderss"/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Provider.php";

    $id_new=(int)uniqid();
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adderss=$_POST['adderss'];
    $city=$_POST['city'];

    $obj = new Provider();
    // $objs = $obj->addProvid_newer($id_new, $name, $phone, $city, $adderss);
?>
<input type="button" value="Создать" onclick="<?php $obj->addDoctor($id_new, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization);?>"></input>
<input type="button" value="Изменить" onclick="<?php $obj->updateDoctor($id, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization);?>"></input>