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
    public function Instance () {
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
     mysqli_close($link);
    }
    
    
    //функция принимает аргументы и добавляет их в таблицу.
    //Важна последовательность аргументов! Добавляются согласно последовательно указанной в таблице(и $this->Columns)
    //Данные передаются в функцию (пока)виде массива / НЕт проверки на ввод запрещённых символов, так как мы не предполагаем какой формат входных данных должен быть
    public function AddRow(array $array)
    {   $arrayStringDataChek = implode(" " ,$array);
        $arrayStringDataSave = implode("','" ,$array);
       if (property_exists($this, 'Columns'))
       {   if (count($array)!= count($this->Columns))
           {echo 'число столбцов таблицы, неравно числу введённых данных'; 
           die();
           }
           
          $link =  mysqli_connect($this->host, $this->dbLogin, $this->dbPass, $this->db);
          mysqli_set_charset($link, 'utf-8');
          $query = "INSERT INTO $this->dbTable  VALUES ('$arrayStringDataSave')";
          $result = mysqli_query($link, $query);
          mysqli_close($link);
          if ($result){return 'Успешно';} else {return 'Не удалось добавить пользователя';}
       }
       else {echo 'Не установилено соединение используйте сначала  Instance ()';
            die();}
    }
    
}

$obj = new MSQLwork($db,$dbLogin,$dbPass, $dbTableUsers,$host);
$obj->Instance();
$res = $obj->AddRow(array ('','1111','2019-04-07 00:00:00', '1000'));
echo $res;
//print_r ($obj);

