/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * function loadProduct ()
{
    xhr = new XMLHttpRequest();
    xhr.open('POST', 'MiddleDiv/loadProduct.php', true);
    xhr.responseType = 'text';
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('name='+encodeURIComponent($('#name').val())+'&properties='+encodeURIComponent($('#properties').val())+'&cost='+encodeURIComponent($('#cost').val())+'&loadImg='+encodeURIComponent($('#loadImg').val()));
    xhr.onload = function () {
    if (xhr.readyState === xhr.DONE) {
    if (xhr.status === 200) {
    console.log(xhr.responseText); 
     }}};
}
 */

function AddProduct ()
{
   $('#CatalogTable').hide();
   $('#AddTable').show();
}


//получить размер базы данных продуктов
function GetSizeDBProducts (count)
{
    xhr = new XMLHttpRequest();
    xhr.open('POST', 'MiddleDiv/Engine.php', true);
    xhr.responseType = 'text';
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('sizeDBProducts');
    xhr.onload = function () {
    if (xhr.readyState === xhr.DONE) {
    if (xhr.status === 200) {
    console.log(xhr.responseText); 
    return count;
     }}};
}
//
function InstanseProduct (ID)
{
    xhr = new XMLHttpRequest();
    xhr.open('POST', 'MiddleDiv/Engine.php', true);
    xhr.responseType = 'text';
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('command = getPropertiesIds,','ID='.ID);
    xhr.onload = function () {
    if (xhr.readyState === xhr.DONE) {
    if (xhr.status === 200) {
    console.log(xhr.responseText); 
    
   }}};
}