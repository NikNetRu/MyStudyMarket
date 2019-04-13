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




