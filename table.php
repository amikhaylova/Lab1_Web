<?php
$time_start = microtime(true);
if (isset($_GET['x']) && isset($_GET['hidden_y']) && isset($_GET['r'])) {
    $x = $_GET['x'];
    $y = $_GET['hidden_y'];
    $r = $_GET['r'];
    $answer = false;
    if ((($x ** 2 + $y ** 2 <= $r ** 2) && ($x <= 0) && ($y >= 0)) ||
        (($y >= 0) && ($y <= $r / 2) && ($x >= 0) && ($x <= $r)) ||
        (($y >= $x - $r / 2) && ($y < 0) && ($x > 0))) {
        $answer = true;
    }
}
$time_end = microtime(true);
$execution_time = ($time_end - $time_start);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table id="ans">
    <tr>
        <td class="top1" colspan="2">
            <p id="lab"><b>Лабораторная работа №1</b></p>
        </td>
    </tr>
    <tr >
        <td class="top2" colspan="2">
            <p id="name"><b>Выполнила:</b> Михайлова А.А.,
                <b>гр.</b> P3211
                <br>
                <b>Вариант:</b> 211014
            </p>
        </td>
    </tr>
    <tr>
        <td align="right">
            <br>
            <h2>Значение R:</h2>
        </td>
        <td align="left">
            <br>
            <?php
            print $r;
            ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <h2>Значение X:</h2>
        </td>
        <td align="left">
            <?php
            print $x;
            ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <h2>Значение Y:</h2>
        </td>
        <td align="left">
            <?php
            print $y;
            ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <h2>Попадание точки в область:</h2>
        </td>
        <td align="left">
            <?php
            print $answer ? "точка попала в область" : "точка не попала в область";
            ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <h2>Время выполнения скрипта:</h2>
        </td>
        <td align="left">
            <?php
            printf('%.6F', $execution_time);
            ?> секунд
        </td>
    </tr>
    <tr>
        <td align="right">
            <h2>Текущее время:</h2>
        </td>
        <td align="left">
            <?php
            date_default_timezone_set('Europe/Moscow');
            print date("H:i:s");
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <div>
                <button onclick="history.back()" id="back_but">Вернуться назад</button>
            </div>
        </td>
    </tr>
</table>
</body>
</html>