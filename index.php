<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
<script> $('document').ready(function () {$('#centralblock').load('MiddleDiv/Catalog.php', function() {alert("Успешно загружено");});})</script>
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MiniMarket</title>
        <link href="CSS/styles.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="ClasesAndScripts/JSindex.js"></script>
        
    </head>
    
    <body>
     <!-- Тут только про хеадер-->    
     <div id ="myhead">
         <header class="bigText">
             <h1>MiniMarket</h1>
         </header> 
     </div>
     
     
        <!--Левая панель--> 
        <div  id = "leftblock" class="smallText">
            <label id="Catalog" onclick="loadMidDivCatalog(this)"> Каталог </label> <br>
            <label id="BuyAndOrder" onclick="loadMidDivCatalog(this)"> Оплата и доставка </label> <br>
            <label id ="Contacts" onclick="loadMidDivCatalog(this)"> Контакты </label> <br>
        </div>
        
        <!--Центральный блок-->
    <div  id = "centralblock"></div>
        <!--Правая панель-->
        <div  id = "rightblock">
            <label>Логин</label><br><br><br>
            <input id="email" placeholder="E-mail"> <br> <br><br>
            <label>Пароль</label> <br><br><br>
            <input id="password" placeholder="Password"> <br>
            
        <!--Бутер-->
    <div id ="myboot" class="bigText">
             <h2>HiHo</h2>
     </div>
        
        
        <?php
        ?>
    </body>
</html>
