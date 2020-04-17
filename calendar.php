<style>
*{
    margin:0;
    padding:0;
}
.cla{
    display:flex;
    /* flex-direction:column; */
    flex-wrap:wrap;
    /* flex-flow:column; */
    padding:10px;
    justify-content:center;
    align-content:space-between;
   

}
table{  
    border-collapse:collapse;
    margin:1%; 

    
}

table td{
    border:1px solid #CCC;
    padding:15px;
    text-align:center;
}
/* table td:nth-child(1) */
table tr:nth-child(2){
    background:#bbc;
} 
</style>

<h4 align = "center",>行事曆</h4>
<div>年份:2021</div>
<div class="cla">

<div>
    <h4>
        <a href="#">上一月<?php echo (date('m')-1)?></a>
        <a href="#">這個月<?php echo date('m') ?></a>
        <a href="#">下一月<?php echo (date('m')+1) ?> </a>
    </h4>
</div>

<?php

$year="2021";
for($m=1;$m<=12;$m++){
?>
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