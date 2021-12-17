<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    Фамилия <input type="text" name="name" required/><br><br>
    Отчество <input type="text" name="surname" required/><br><br>
    Имя <input type="text" name="last_name"/><br><br>
    Город <input type="text" name="city" required/><br><br>
    <button type="submit">Send</button><br><br>
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
?>
<?php if(isset($_POST['id'])):?>
<input type="button" value="Создать" onclick="<?php $obj->addCourier($id_new, $name, $last_name, $surname, $city);?>"></input>
<?php else;?>
<input type="button" value="Изменить" onclick="<?php $obj->updateCourier($id, $name, $last_name, $surname, $city);?>"></input>
<?php endif;?>