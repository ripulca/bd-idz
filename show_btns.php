<?php
    require_once "models/PDO.php";
    $dbConfigPath='config/parameters.ini';
    $dir="php_show";
    $show_file=scandir($dir);
    $mod_file=['', '', 'Courier', 'Customer', 'Doctor', 'Hospital', 'Medicine', 'Order', 'OrderItem', 'Provide', 'Provider'];
    $i=0;

    if(isset($_POST['login']) && isset($_POST['password'])):  
        if (!($pdoConfig = parse_ini_file($dbConfigPath))) :
            throw new Exception("Ошибка парсинга файла инициализации бд", 1);
        endif;
        $login=$_POST['login'];
        $password=$_POST['password'];
    ?>
        <?php if($login===$pdoConfig['login'] && $password===$pdoConfig['password']): ?>
            <?php for($i=2;$i<count($mod_file);$i++): ?>
                
                <a href="/php_show/<?echo $show_file[$i]?>"><?php echo $mod_file[$i]?></a><br><br>
            <?php endfor;?>
        <?php else: ?>
            <p>Error</p>
        <?php endif;
    endif;?>