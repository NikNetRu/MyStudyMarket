<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. $host,$db, $dbLogin,$dbPass,$dbTable
 */
$host = "127.0.0.1";  
$db = "mystudymarket"; //имя БД
$dbLogin = "root";    //логин пользователя БД
$dbPass = "";         //пароль пользователя БД
$dbTableUsers = "users"; //таблица пользователей
$dbTableProducts = "products"; //таблица каталога продуктов


//**Данный класс работает с БД.
//должен принимать параметры БД и таблицы с которой работает
//Использовать столбы разных таблиц для запросов на сравнение, создание, удаление и т.п.


class MSQLwork {
    public function __construct($db,$dbLogin,$dbPass, $dbTable, $host) {
        $this->db = $db;
        $this->dbLogin = $dbLogin;
        $this->dbPass = $dbPass;
        $this->dbTable = $dbTable;
        $this->host = $host;
    }
    
    
    // Функция реализует соединение с сервером и работы с ним, так же получает данные столбов $this->Columns с которыми предстоит работать
    public function Connect () {
      $link =  mysqli_connect($this->host, $this->dbLogin, $this->dbPass, $this->db);
      mysqli_set_charset($link, 'utf-8');
      $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$this->dbTable' AND TABLE_SCHEMA = '$this->db'";
      $result = mysqli_query($link, $query);
      $result->fetch_assoc();
      $arrayColumns = array ();
     foreach ($result as $row=>$value)
          {  foreach ($value as $row1=>$value1)
            $arrayColumns [] = $value1;
          }
     $this->Columns = $arrayColumns;
    }
    
    
}

$obj = new MSQLwork($db,$dbLogin,$dbPass, $dbTableUsers,$host);
$obj->Connect();
print_r ($obj);
