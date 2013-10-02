<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php if($lastcheckedin != NULL): ?>
 <label for="select-native-17">Last Checked In Stop Time:<?php echo $lastcheckedname.',&nbsp;'.$lastcheckedin;  ?></label>
 <hr>
 <?php endif; ?>

<?php 

foreach($data as $data){
    
$stopname = $data['stop_name'];
$time = $data['time'];
echo ucfirst($stopname).':'.$time;
echo "<br/>";

   

}




?>