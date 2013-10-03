<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php if($lastcheckedin != NULL): ?>
<label for="select-native-17">Last Checked In Stop Time:<?php echo $lastcheckedname.',&nbsp;'.date('h:i A',strtotime($lastcheckedin));  ?></label>
<?php endif; ?>
<br/>
<p>Regular Bus Route Timings</p>

<ul class="places-display" data-role="listview" data-inset="true">
<?php 
foreach($data as $data){
	$stopname = $data['stop_name'];
	$time = $data['time'];
?>
<li><?php echo ucfirst($stopname);?><em><?php echo date('h:i A',strtotime($time));//echo $time;?></em>
</li>
<?php } ?>
</ul>


