<?php
include_once '../ClasesAndScripts/Products.php';
$name = filter_input(INPUT_POST, 'name');
$properties = filter_input(INPUT_POST, 'properties');
$cost = filter_input(INPUT_POST, 'cost');
$nameFormUpload = 'loadImg';
$loadThis = new Products ();

$loadThis->Createproduct('', $name, $properties, $nameFormUpload, $cost);
$loadThis->PushToDatabase($nameFormUpload);
echo 'Succ';