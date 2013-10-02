<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-1.9.1.min"></script>

<p><?php echo CHtml::link("Check Out", array('../')); ?></p>

<?php
if(isset($_GET) && !empty($_GET)){
$criteria = new CDbCriteria();
$criteria->condition = 'route_id ='.$_GET['key'];
}
$bus_route = BusStop::model()->findAll($criteria);

foreach ($bus_route as $value) {
    ?>

    <?php $date = date('h:i', strtotime($value->time)); ?>
    <div>
        <ul>
            <li>
                <?php echo ucfirst($value->stop_name); ?>
                <?php if ($value->created_time != NULL) { ?>
                    <input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_" . $value->id ?>" value="<?php echo $value->id; ?>" checked="checked"/>
                <?php } else { ?>
                    <input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_" . $value->id ?>" value="<?php echo $value->id; ?>"/>
                <?php } ?>
            </li>
        </ul>
    </div>

<?php } ?>

<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl; ?>">
<input type="hidden" id="bus_route" value="<?php echo $_GET['key']; ?>">

<script type="text/javascript">

    $(document).ready(function() {
        var url = $('#url').val();
        $('.chk').click(function() {
            //var checked = $(this).val();
            var checkbox = $(this);
            if (checkbox.is(':checked')) {
                var value = checkbox.val();
                var route_id = $('#bus_route').val();
                $.ajax({
                    type: 'POST',
                    url: url + '/busroute/addCheckedTime',
                    data: {value: value,route_id:route_id},
                    dataType: 'json',
                    success: function(response) {
                        //alert(response);
                        $.each(response, function(index, order) {
                            $('#route_chk_'+order).prop('checked',true);
                        });
                        
                    }
                });
            } else {
                var value = checkbox.val();
                $.ajax({
                    type: 'POST',
                    url: url + '/busroute/removeCheckedTime',
                    data: {value: value},
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(index, order) {
                            $('#route_chk_'+order).prop('checked',false);
                        });
                        
                    }
                });
            }

        });
    });


</script>
