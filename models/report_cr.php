<?php

require_once "Report.php";

$obj=new Report();
$e=$obj->first_report();
foreach($e as $key){
echo 'Код покупателя    '.$key['customer_code']."<br>";
echo 'Фамилия    '.$key['customer_name']."<br>";
echo 'Имя    '.$key['customer_last_name']."<br>";
echo 'Отчество     '.$key['customer_city']."<br>";
echo 'Код заказа    '.$key['order_code']."<br><br>";}