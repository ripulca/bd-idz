<form method='POST' action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" name="name" required/>
    <input type="number" name="price" required/>
    <input type="text" name="composition"/>
    <input type="text" name="pharmgroup" required/>
    <input type="text" name="indications"/>
    <input type="text" name="side_effects"/>
    <input type="text" name="contraindications"/>
    <input type="text" name="pharmachologic_effect"/>
    <button type="submit">Send</button>
</form>

<?php
    require_once "../models/Medicine.php";

    $id_new=int(uniqid();
    $name=$_POST['name'];
    $price=$_POST['price'];
    $composition=$_POST['composition'];
    $pharmgroup=$_POST['pharmgroup'];
    $indications=$_POST['indications'];
    $side_effects=$_POST['side_effects'];
    $contraindications=$_POST['contraindications'];
    $pharmachologic_effect=$_POST['pharmachologic_effect'];

    $obj = new Medicine();
    // $objs = $obj->addMedicine($id, $name, $price, $composition, $pharmgroup, $indications, $side_effects, $contraindications, $pharmachologic_effect);
?>
<input type="button" value="Создать" onclick="<?php $obj->addDoctor($id_new,$name, $price, $composition, $pharmgroup, $indications, $side_effects, $contraindications, $pharmachologic_effect);?>"></input>
<input type="button" value="Изменить" onclick="<?php $obj->updateDoctor($id, $name, $price, $composition, $pharmgroup, $indications, $side_effects, $contraindications, $pharmachologic_effect);?>"></input>