<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="text" name="surname" required/>
    <input type="text" name="last_name"/>
    <input type="text" name="city" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Courier.php";

    $id=$_POST['id'];
    $id_new=(int)uniqid();
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city'];

    $obj = new Courier();
    // $objs = $obj->addCourier($id_new, $name, $last_name, $surname, $city);
?>
<input type="button" value="Создать" onclick="<?php $obj->addCourier($id_new, $name, $last_name, $surname, $city);?>"></input>
<input type="button" value="Изменить" onclick="<?php $obj->updateCourier($id, $name, $last_name, $surname, $city);?>"></input>