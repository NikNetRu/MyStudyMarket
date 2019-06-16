<?php
include '../ClasesAndScripts/Products.php';
//JS присылает комманду на основе её выполняются действия
$command = filter_input(INPUT_POST, 'command');
$ID= filter_input(INPUT_POST, 'ID');


//получить размер выбранной базы данных
if ($command == 'sizeDBProducts'){
   $link = new MSQLwork();
   $link -> Instance('products');
   $sizeDB = $link ->SizeDB();
   echo $sizeDB;
}

if ($command == 'getPropertiesIds'){
   $product = new Products();
   $IDproperies = $ID->GetProduct($ID);
   echo $IDproperies;
}

if ($command == 'getAllElements'){
   $product = new Products();
   $IDproperies = $product->ExtractTableProducts();
   print_r($IDproperies);
   echo json_encode($IDproperies);
   return json_encode($IDproperies);
}

    