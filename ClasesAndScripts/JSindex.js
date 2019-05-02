/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. <link href = "../MiddleDiv/Catalog.php" >
 */


//* Должны узнать кто вызвал, и в зависимости от этого вернуть в средний блок DIV содержимое URl 
function loadMidDivCatalog (event){
    $('#centralblock').load('MiddleDiv/'+event.id+'.php');
}