<?php
$time_start = microtime(true);
if (isset($_GET['x']) && isset($_GET['hidden_y']) && isset($_GET['r'])) {
    $x = $_GET['x'];
    $y = $_GET['hidden_y'];
    $r = $_GET['r'];

    //являются ли переданные параметры числами
    $val_x = is_numeric($x);
    $val_y = is_numeric($y);
    $val_r = is_numeric($r);

    //входят ли параметры в область определния
    $cor_x = false;
    $cor_r = false;
    $cor_y = false;

    if ($val_x){
        $cor_x = ($x>-3)&&($x<5);
    }

    if ($val_r){
        $odz_r = array(1, 1.5, 2, 2.5, 3);
        $cor_r = false;
        foreach ($odz_r as $value_r){
            if ($value_r == $r){
                $cor_r = true;
                break;
            }
        }
    }

    if ($val_y){
        $odz_y = array(-4, -3, -2, -1, 0, 1, 2, 3, 4);
        $cor_y = false;
        foreach ($odz_y as $value_y){
            if ($value_y == $y){
                $cor_y = true;
                break;
            }
        }
    }

    //если входят в область определения, определяем, входит ли точка в заданную область
    if ($cor_x && $cor_y && $cor_r){
        $answer = false;
        if ((($x ** 2 + $y ** 2 <= $r ** 2) && ($x <= 0) && ($y >= 0)) ||
            (($y >= 0) && ($y <= $r / 2) && ($x >= 0) && ($x <= $r)) ||
            (($y >= $x - $r / 2) && ($y < 0) && ($x > 0))) {
            $answer = true;
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
                <td align="left" id="clock">
                    <script>
                        function clock() {
                            let date = new Date();
                            let hour=date.getHours();
                            let minute=date.getMinutes();
                            let sec=date.getSeconds();
                            document.getElementById('clock').innerHTML = (hour<10?'0':'')+hour+':'+(minute<10?'0':'')+minute+':'+(sec<10?'0':'')+sec;
                            //чтобы вызывать функцию clock() через 1000 милисекунд => обновляем время
                            window.setTimeout('clock()',1000);
                        }
                        clock();
                    </script>
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

        <?php
        //если не являются валидными
    } else{
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
                <td class="top2" align="center">
                    <p>Невозможно выполнить запрос (переданные параметры не явлются валидными).</p>
                </td>
            </tr>
        </table>
        </body>
        </html>
        <?php
    }

    //если не были заданы
}else{
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
            <td class="top2" align="center">
                <p>Невозможно выполнить запрос (переданы не все параметры).</p>
            </td>
        </tr>
    </table>
    </body>
    </html>
    <?php
}
?>
