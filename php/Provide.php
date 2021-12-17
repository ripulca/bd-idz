<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="meds_id" required/>
    <input type="number" name="amount" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Provide.php";

    $id_new=(int)uniqid();
    $meds_id_new=$_POST['meds_id_new'];
    $amount=$_POST['amount'];

    $obj = new Provide();
    // $objs = $obj->addProvid_newe($id_new, $meds_id_new, $amount);
?>
<input type="button" value="Создать" onclick="<?php $obj->addDoctor($id_new, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization);?>"></input>
<input type="button" value="Изменить" onclick="<?php $obj->updateDoctor($id, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization);?>"></input>