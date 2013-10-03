<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

  <?php if($lastcheckedin != NULL): ?>
<label for="select-native-17">Last Checked In Stop Time:<?php echo $lastcheckedname.',&nbsp;'.date('h:i A',strtotime($lastcheckedin));  ?></label>
 <hr>
 <?php endif; ?>


 <ul class="places-display" data-role="listview" data-inset="true">
      
    

<?php 

foreach($data as $data){
    
$stopname = $data['stop_name'];
$time = $data['time'];
echo ucfirst($stopname).':'.date('h:i A',strtotime($time));
echo "<br/>";

   

}




?>