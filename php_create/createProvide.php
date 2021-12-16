<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="number" name="meds_id" required/>
    <input type="number" name="amount" required/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "models/Provide.php";

    $id=hexdec(uniqid());
    $meds_id=$_POST['meds_id'];
    $amount=$_POST['amount'];

    $obj = new Provide();
    $objs = $obj->addProvide($id, $meds_id, $amount);
?>