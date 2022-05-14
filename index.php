<?php 
require_once 'model/curl.php';

function debug($data) {
     echo '<pre>';
     print_r($data);
     echo '</pre>';
 } 

$employes = new curl();
 
//$result = $employes->newEmployee("Петров", "Петр", "Иванович", "222490425273", "Директор", "89534758562");

//$res = $employes->getEmployees();
//debug($res);

$resu = $employes->changeEmployee("Василий", "Теркин");
debug($resu);
        

