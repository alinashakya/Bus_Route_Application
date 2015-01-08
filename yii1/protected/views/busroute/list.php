<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php

	date_default_timezone_set('Asia/Kathmandu');

// $script_tz = date_default_timezone_get();

// if (strcmp($script_tz, ini_get('date.timezone'))){
//     echo 'Script timezone differs from ini-set timezone.';
// } else {
//     echo 'Script timezone and ini-set timezone match.';
// }


	// $date = date('h:i A',strtotime($lastcheckedin));
	// $time = $date->setTimezone(new DateTimeZone('Asia/Kathmandu'));
	// echo $time;
	// die;
?>
<?php if($lastcheckedin != NULL): ?>
	<label class="ui-li ui-li-static ui-btn-up-c lastchecked" for="select-native-17">Last Checked In Stop Time&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $lastcheckedname.',&nbsp;'.date('h:i A',strtotime($lastcheckedin));  ?></label>
 <?php endif; ?>
 <br>
<p style="font-size:16px"><strong>Regular Bus Route Timing</strong></p>

<ul class="places-display ui-listview ui-listview-inset ui-corner-all ui-shadow" data-inset="true" data-role="listview">

<?php foreach($data as $data){?>
    <li class="ui-li ui-li-static ui-btn-up-c">
    <?php
    	$stopname = $data['stop_name'];
		$time = $data['time'];
		echo ucfirst($stopname);
		echo "<em>". date('h:i A',strtotime($time))."</em>";
	}   
	?>

</ul>


