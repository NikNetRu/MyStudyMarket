/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function AddProduct ()
{
   $('#CatalogTable').hide();
   $('#AddTable').show();
}

function loadProduct ()
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