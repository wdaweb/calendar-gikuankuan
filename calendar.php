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
            /* 透明度 */
            
        }
        
        table td{
            border:1px solid #CCC;
            padding:15px;
            text-align:center;
            border:black solid 1px;
        }
        /* table td:nth-child(1) */
        table tr:nth-child(2){
            background:#351E29;
        } 
        </style>
</head>

<body>
    <?php
      $year=date('y');
      $m=date('m');
    @$year=$_GET["year"];
    // @$m=$_GET["moon"];
    // 在一開始先宣告 年 跟 月的變數方便後面使用
    // $m=$_POST[date('m')];
   
    ?>
<h4 align = "center">行事曆</h4>
<div align = "center">年份:<?php echo $year?></div>
<div align = "center">
    <h4>
        <a href="#">上一月  <?php echo date('m')-1?></a>
        <a href="">這個月  <?php echo date('m') ?></a>
        <a href="#">下一月  <?php echo date('m')+1?> </a>
        <!-- 之後這邊再增加post去對變數做變化 -->
    </h4>
    <div><form action="calendar.php" method="get">
        輸入年份: <input type="text" name="year" />
        輸入月份: <input type="text" name="moon" />
　<input type="submit" value="送出表單"/>
</form></div>
</div>
<div class="cla">

    <?php
  
    if($m == true){
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