<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="hospital_id" required/>
    <input type="text" name="name" required/>
    <input type="text" name="surname" required/>
    <input type="text" name="last_name"/>
    <input type="text" name="post" required/>
    <input type="text" name="phone"/>
    <input type="text" name="specialization" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Doctor.php";

    $id=hexdec(uniqid());
    $hospital_id=$_POST['hospital_id'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city'];

    $obj = new Doctor();
    $objs = $obj->updateDoctor($id, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization);
?>