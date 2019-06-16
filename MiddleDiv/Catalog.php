<html>
    <head>
        <title>Catalog</title>  
        <link href="CSS/Catalog.css" rel="stylesheet"> 
        <script src="MiddleDiv/JSforDiv/Catalog.js"></script>
        <script>
          //загружаются данные из каталога БД products и создаются объекты
          size = GetSizeDBProducts ();
         
          //класс содержащий обьект загружаемый из БД для генерации этой страницы
          //InstanseDom генерирует изображее со ссылкой на новую страницу описания товара
          class CatalogContainer {
            constructor (ID,name,properties, srcjpeg, cost) {
            this.ID = ID;
            this.name = name;
            this.properties = properties;
            this.srcjpeg = srcjpeg;
            this.cost = cost;
        }
            IsntanseDOM (){
              var mosaicEl = $('<figure/>', {
                                position: 'relative',
                                name: this.name,
                                id: this.ID,
                                class: 'iconCatalog',
                                text: '',
                                click: function() {
                                                    alert('тут откроется страница');
                                                    }
                          
                                   });  
              var imgFormosaic = $('<img/>', {
                                src: 'UserPictures/'+this.srcjpeg,
                                width: '80',
                                heigh: '80'
                                   });  
                      
            mosaicEl.appendTo('#CatalogTable');
            imgFormosaic.appendTo('#'+this.ID);
            $('#'+this.ID).offset(function (index, value) {
                    var newCoord = {};
                    newCoord.top = value.top - 60;
                    newCoord.left = value.left +100;
                    return newCoord;
                    
                                                            });
            }
          }
          
          // Небольшая функция для отправки на сервер нужной команды и получения ответа
          //список комманд: sizeDBProducts - размер базы данных продуктов.
          //getAllElements - вернуть все строки в виде массива [1] => array (ID => XX, ...) ... [n] = > array ()
          function sendEngine (command) {
            xhr = new XMLHttpRequest();
            xhr.open('POST', 'MiddleDiv/Engine.php', true);
            xhr.responseType = 'text';
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(command);
            xhr.onload = function () {
            if (xhr.readyState === xhr.DONE) {
            if (xhr.status === 200) {
                return xhr.responseText;
            }
        }
    };
    }
        
        elementsJSON = sendEngine('getAllElements');
        elementsArray =  JSON.parse(elementsJSON);
        
        data = new CatalogContainer('1', '222','dwada','5261.gif', '2323');
        data.IsntanseDOM();
        </script>
    </head>
    
    <body>
        <div id ="CatalogTable" >
        <figure id ="CreateNew" class = "iconCatalog" onclick = "AddProduct()">
            <p><img src="jpeg/Add.png" alt="" width="80" height="80"/></p>
            <figcaption>добавить</figcaption>
        </figure>
        </div>
        
        
        <div id ="AddTable" hidden="">
            <form enctype="multipart/form-data" method="POST" action="MiddleDiv/loadProduct.php">
                <label>Наименование</label> <input id = "name" name = "name"> <br>
                <label>Описание</label> <textarea id = "properties" name = "properties"></textarea> <br>
                <label>Цена</label> <input id = "cost" name = "cost"> <br>
                <label>Загрузить изображение</label> <input id = "loadImg" name = "loadImg" type="file"> <br>
                <button type = "submit">Отправить</button> <br>
            </form>
        </div>
        
        <div id = "DataBaseView">
            
        </div>
        <?php
        include '../ClasesAndScripts/Products.php';
        $link = new MSQLwork();
        $link -> Instance('products');
        $sizeDB = $link ->SizeDB();
        ?>
    </body>
</html>

