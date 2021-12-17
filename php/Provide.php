<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="meds_id_new" required/>
    <input type="number" name="amount" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Provid_newe.php";

    $id_new=hexdec(uniqid_new());
    $meds_id_new=$_POST['meds_id_new'];
    $amount=$_POST['amount'];

    $obj = new Provid_newe();
    $objs = $obj->addProvid_newe($id_new, $meds_id_new, $amount);
?>