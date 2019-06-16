<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *ТАк добавить везде проверку на то что если пользователь введёт существующий ID сделать die
 * @author Andrey
 */


include_once  '../Config/Config.php';
include_once 'HelperScript.php';

class Products {
    private $dbProducts = "products";


    /**
     * функция создаёт продукт, ID - должен быть пустм если в БД - автоинкремент
     */
        public function Createproduct ($ID,$name,$properties, $srcjpeg, $cost) {
        $this->ID = $ID;
        $this->name = $name;
        $this->properties = $properties;
        $this->srcjpeg = $srcjpeg;
        $this->cost = $cost;
    }
    
    
    /**
     * отправляет данные продукта в БД указанную в Config.php как БД пользователя
     * 
     */
        public function PushToDatabase ($nameFormUpload){
        $link = new MSQLwork();
        $link->Instance($this->dbProducts);
        $exist = $link->FindThis(array ($this->ID),array ("ID"));
        if (empty($exist)) {
            echo 'Уже существует';
            die();
        }
        $chekType = CheckTypeFile ($nameFormUpload, array ('jpeg','jpg','gif'));
        if (!$chekType == True) {die();}
        
        $nameUploadedFile = UploadFile($nameFormUpload, "C:\\xampp\htdocs\MyStudyMarket\UserPictures"); 
        $this->srcjpeg = $nameUploadedFile;
        $link -> AddRow(array ("$this->ID","$this->name", "$this->properties", "$this->srcjpeg", "$this->cost"));
        echo 'Успешно добавлен';
        }
        
        public function GetProduct ($ID){
        $link = new MSQLwork();
        $dataUser =[];
        $link->Instance($this->dbProducts); 
        $result = $link ->FindThis(array ("$ID"), array ("ID"));
        foreach ($result as $key => $value) {
            foreach ($value as $key => $value) {
                $dataUser[] = $value;
            }
        }
        $this->ID = $dataUser[0];
        $this->name = $dataUser[1];
        $this->properties = $dataUser[2];
        $this->srcjpeg = $dataUser[3];
        $this->cost = $dataUser[4];
        }
        
        public function ExtractTableProducts (){
        $link = new MSQLwork();
        $dataUser =[];
        $link->Instance("products"); 
        $result = $link ->getAllElements();
        //$result = mysqli_fetch_assoc($result);
        $count = 0;
        foreach ($result as $array)
        { $count++;
        foreach ($array as $key =>$value)
        { 
            $elements[$count][] = array($key => $value);
            echo $key.'=>'.$value.'</br>';
        }
        }
        return $elements;
        }
        
        
        
        
}
        