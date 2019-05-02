<?php
include_once 'ClasesAndScripts/Products.php';
$name = filter_input(INPUT_POST, 'name');
$properties = filter_input(INPUT_POST, 'properties');
$cost = filter_input(INPUT_POST, 'cost');
$LoadImg = filter_input(INPUT_POST, 'LoadImg');
$loadThis = new Products ();

$loadThis->Createproduct('', $name, $properties, $LoadImg, $cost);
$loadThis->PushToDatabase();
echo 'Succ';