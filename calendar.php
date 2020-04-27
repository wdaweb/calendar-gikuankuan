<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J個4日歷辣</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        }
        .cla{
            display:flex;
            /* flex-direction:column; */
            flex-wrap:wrap;
            /* flex-flow:column; */
            padding:10px;
            justify-content:center;
            align-content:space-between;
            color:white;
            
        
        }
        table{  
            border-collapse:collapse;
            margin:1%; 
            background:#A13D63;
            border:black solid 2px;
            opacity:0.9; 
            /* border-radius: 5%; */
            /* 透明度 */
            
        }

        table td{
            border:1px solid #CCC;
            padding:25px;
            text-align:center;
            border:black solid 0.5px;
            /* border-radius: 20%; */
        }
        /* table td:nth-child(1) */
        table tr:nth-child(2){
            background:#351E29;
        } 
        </style>
</head>

<body>
    <?php
    if (!empty($_GET['year'])) {
        $year = $_GET['year'];
     } else {
        $year = date("Y");
     }
     if (!empty($_GET['mouth'])) {
        $m = $_GET['mouth'];
     } else {
        $m = date("m");
     }
    // 第一步驟作為判斷變數裡面是否為空值，如果是就用現在本機時間，
    // 如果非空值代表我有輸入變數控制，就以控制為主
    // 在一開始先宣告 年 跟 月的變數方便後面使用

    //  顯示用的跳躍月份
     $nextmouth = $_GET['mouth']+1;
     $upmouth= $_GET['mouth']-1;
    
    if($nextmouth>12){
        // $year++;
        $nextmouth = 1;
    }else{
        $nextmouth;
    }

    if($upmouth<1){
        // $year--;
        $upmouth = 12;
    }else{
        $upmouth;
    }


    ?>
<h1 align = "center">行事曆</h1>
<div align = "center">年份:<?php echo $year?></div>
<div align = "center">
    <h3>
        <a href="calendar.php?year=<?=$year?>&mouth=<?=$upmouth?>">上一月：<?php echo $upmouth?></a>
             
        <a href="">這個月：<?php echo $m ?></a>
       
        <a href="calendar.php?year=<?=$year?>&mouth=<?=$nextmouth?>">下一月：<?php echo $nextmouth?></a>
        <!-- 之後這邊再增加post去對變數做變化 -->
    </h3>
    <div><form action="calendar.php" method="get">
        輸入年份: <input type="text" name="year" />
        輸入月份: <input type="text" name="mouth" />
　<input type="submit" value="送出表單"/>
</form></div>
</div>
<div class="cla">

    <?php
  
    if($m == true || 0){
    ?>
    <!-- 目前想法是給年月各一個新的變數，用if去做月份的控制 -->

        <table>
        <tr><td colspan="7">月份：<?=$m;?></tr></td>
            <tr>
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
            </tr>

        <?php

            $firstDay = "$year-$m-01";
            $firstDayWeek = date("w", strtotime($firstDay));
            $lastDayWeek = date("t", strtotime($firstDay));

            // echo "第一天星期" . $firstDayWeek;
            // echo "<br>";
            // echo "月天數" . $lastDayWeek;

                for($i=0;$i<6;$i++){
                    echo "<tr>";
                    for($j=0;$j<7;$j++){
                        if($i==0 && $j<$firstDayWeek){
                            echo "<td>";
                            echo "</td>";
                        }else{
                            echo "<td>";
                            $num = $i*7+$j+1-$firstDayWeek;
                            if($num<=$lastDayWeek){
                                echo $num;
                            }
                            echo "</td>";
                        }
                    }
                    echo"</tr>";
                }

                
                
                ?>
                </table>

                <?php
        }
        ?>
</div>
</body>
</html>