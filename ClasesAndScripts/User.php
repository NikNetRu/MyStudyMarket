<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Andrey
 */

include_once  '../Config/Config.php';
include_once 'HelperScript.php';

class User {
    
    private $dbUsers = "users";


    /**
     * функция создаёт пользователя ID - должен быть пустм если в БД - автоинкремент
     */
        public function CreateUser($ID,$email,$password, $cash) {
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
        $this->registrDate = date("Y-m-d H:i:s");
        $this->cash = $cash;
    }
    /**
     * отправляет данные пользователя в БД указанную в Config.php как БД пользователя
     * если пользователь имеет пустые строки(не создано)либо запрещенные символы выведет сообщение  об ошибке
     * Так же проверит есть ли такой Email в системе
     */
        public function PushToDatabase (){
        $link = new MSQLwork();
        $link->Instance($this->dbUsers);
        $chekDataSymbol = (CheсkData($this->password) or CheсkData($this->cash));
        $chekDataEmail = (CheсkDataEmail($this->email));
        if ($chekDataSymbol or $chekDataEmail) {
            echo 'Ошибка формата полученных данных'; 
            die ();
        }
        $exist = $link->FindThis(array ($this->email),array ("email"));
        if (empty($exist)) {
            echo 'Уже существует';
            die();
        }
        $link -> AddRow(array ("$this->ID","$this->email", "$this->password", "$this->registrDate", "$this->cash"));
        echo 'Успешно добавлен';
        }
        
     /**
     * Получает данные пользователя по ID в числовом формате и копирует в обьект
     */
        public function GetUser ($ID){
        $link = new MSQLwork();
        $link->Instance(); 
        $link ->FindThis("$ID", "ID");
        }
    
    
}


$user = new User();
$user -> CreateUser("", "NIkdwa@list.ru", "mypass", 100);
print_r($user);
$user ->PushToDatabase();
