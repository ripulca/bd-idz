<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="number" name="price" required/>
    <input type="text" name="composition"/>
    <input type="text" name="pharmgroup" required/>
    <input type="text" name="indications"/>
    <input type="text" name="sid_newe_effects"/>
    <input type="text" name="contraindications"/>
    <input type="text" name="pharmachologic_effect"/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Medicine.php";

    $id_new=hexdec(uniqid_new());
    $name=$_POST['name'];
    $price=$_POST['price'];
    $composition=$_POST['composition'];
    $pharmgroup=$_POST['pharmgroup'];
    $indications=$_POST['indications'];
    $sid_newe_effects=$_POST['sid_newe_effects'];
    $contraindications=$_POST['contraindications'];
    $pharmachologic_effect=$_POST['pharmachologic_effect'];

    $obj = new Medicine();
    $objs = $obj->addMedicine($id_new, $name, $price, $composition, $pharmgroup, $indications, $sid_newe_effects, $contraindications, $pharmachologic_effect);
?>