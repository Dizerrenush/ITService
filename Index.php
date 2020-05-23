<?php
require "includes/db.php";
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/body.css">

<style>
    body h1{
   font-size: 40pt;
    font-weight: bold;
}

body h2{
   font-size: 25pt;
}
</style>    
</head>
    <body>
        <?php 
            include "includes/Header.php";
        ?>

        <div class="content">
            <div class="content-inner">
                <div class="description">
                <h1>Ремонт мобильной и компьютерной техники в офисе и у вас дома</h1>
                    <h2> -  Работаем без предоплаты <br> -  Даем гарантию на работы <br> -  Бесплатный выезд мастера </h2>
                    <div class = "column">
                        <a href="#" class="button">Расчитать стоимость ремонта</a>
                        <a href="#" class="button">Вызвать мастера</a>
                    </div>
                </div>
                <img src="img/Comp.png" class="comp">
                
            </div>
        </div>

        <?php
        include "includes/Footer.php";
        ?>

    </body>
</html>