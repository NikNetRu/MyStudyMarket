<?php
/**
 * проверяет строковые данные на запрещённые символы
 * TRUE -запрещенные символы найдены, FALSE - не надены
 */
function CheсkData ($data){
    $pattern = "/[^a-zA-Z0-9_]/";
    if (preg_match($pattern, $data)){
        return TRUE;
    }
 else {
    return FALSE;    
    }
}

function CheсkDataEmail ($data){
    $pattern = "/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i";
    if (!preg_match($pattern, $data)){
        return TRUE;
    }
 else {
      return FALSE;    
      }
}

/*
     * Функция сверяет расширение файла с $type
     */
    
  function CheckTypeFile ($nameFormUpload, array $type) {
        if($_FILES[$nameFormUpload]['name'] == '') {
        return 'Вы не выбрали файл.';}
	if($_FILES[$nameFormUpload]['size'] == 0) {
        return 'Файл слишком большой.'; }
	$getMime = explode('.', $_FILES[$nameFormUpload]['name']); 
	$mime = strtolower(end($getMime));
	if(in_array($mime, $type)) {
        return true;}
	return false;
    }
    
    
    /*
     * Функция загружает выбранный файл по указанному адресу
     * формируя уникальное имя и возвращая его путь
     */
   function UploadFile($file, $src){
	$name = mt_rand(0, 10000) . $_FILES[$file]['name'];
        $scanSrc = scandir($src); //на всякий случай проверим есть ли такой файл
        $distinction = in_array($name, $scanSrc);
        if ($distinction) {
            echo "файл уже существует"; 
            die();
        }
        $destination = $src.'\\'.$name;
        $tmp_name = $_FILES[$file]['tmp_name'];
	move_uploaded_file($tmp_name, $destination);
        return $destination;
  }
