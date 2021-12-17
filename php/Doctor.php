<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="hospital_id_new" required/>
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

    $id_new=hexdec(uniqid_new());
    $hospital_id_new=$_POST['hospital_id_new'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city'];

    $obj = new Doctor();
    $objs = $obj->addDoctor($id_new, $hospital_id_new, $name, $last_name, $surname, $post, $phone, $specialization);
?>