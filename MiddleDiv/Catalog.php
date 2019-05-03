<html>
    <head>
        <title>Catalog</title>  
        <link href="CSS/Catalog.css" rel="stylesheet"> 
        <script src="MiddleDiv/JSforDiv/Catalog.js"></script>
    </head>
    
    <body>
        <div id ="CatalogTable">
        <figure id ="CreateNew" class = "iconCatalog" onclick = "AddProduct()">
            <p><img src="jpeg/Add.png" alt="" width="80" height="80"/></p>
            <figcaption>добавить</figcaption>
        </figure>
        </div>
        
        
        <div id ="AddTable" hidden="">
            <form>
                <label>Наименование</label> <input id = "name"> <br>
                <label>Описание</label> <textarea id = "properties"></textarea> <br>
                <label>Цена</label> <input id = "cost"> <br>
                <label>Загрузить изображение</label> <input id = "loadImg" type="file"> <br>
                <button type = "button" onclick="loadProduct()">Отправить</button> <br>
            </form>
        </div>
        <?php
        
        ?>
    </body>
</html>

