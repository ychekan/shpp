<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Generator</title>
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet"/>
    <link href="css/charisma-app.css" rel="stylesheet"/>
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href='css/noty_theme_default.css' rel='stylesheet'/>
</head>
<body>

<div class="box-content">
    <div class="box-inner">
        <div class="box-content">
            <!--        <form action="" name="ups" method="post" class="form-horizontal" onsubmit="return validTypeForm();">-->
            <form action="" name="ups" method="post" class="form-horizontal">
                <div class="form-group">
                    <div class="col-xs-2">
                        <label for="prefix">Префикс</label>
                        <input type="number" class="form-control" name="prefix" id="prefix" placeholder="0" size="1"
                               minlength="1" maxlength="1" min="1" max="9"
                               title="Префикс, 1 значное число - смотреть по алгоритму!">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <label for="main">Основа, без префикса</label>
                        <input type="number" class="form-control" id="main" name="main" placeholder="12345" size="5"
                               minlength="5" maxlength="5" min="1" max="99999"
                               title="Основа без префикса, 5 знаков!"></div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <label for="kod">Откуда начать</label>
                        <input type="number" class="form-control" name="start" id="start" placeholder="00001"
                               title="Начало генерируемого UPC, 5-значное число!" minlength="5" maxlength="5" min="1" max="99999">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">

                        <label for="count">Количество</label>
                        <input type="number" class="form-control" name="count" id="count" placeholder="0"
                               minlength="1" maxlength="4" min="1" max="9999" title="Количество которое нужно!">
                    </div>
                </div>
                <p>
                    <input type="submit" name="generic" class="btn btn-primary" value="Generator go">
                    <input type="submit" name="print" class="btn btn-warning" value="Print go">
                </p>
        </div>
    </div>
</div>
</form>
</body>
</html>
<?php
include "autoload.php";
$obj = new \core\Main();
?>