<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 

foreach($data as $data){
    
$stopname = $data['stop_name'];
$time = $data['time'];
echo ucfirst($stopname).':'.$time;
echo "<br/>";

   

}




?>