<?php
    $datetime = date ('Y-m-d H:i:s' , mktime(date('H')+6, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
    $moon = date('m');
    echo $datetime;
    
    echo $moon;
    

?>
<hr>
<div>
    <h4>
        <a href="#">上一月<?php echo $_POST[(date('m')-1)]?></a>
        <a href="#">這個月<?php echo date('m') ?></a>
        <a href="#">下一月<?php echo $_POST[(date('m')+1)]?> </a>
    </h4>

    
</div>