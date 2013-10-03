<section>
<div class="btn-wrap checkout">
  
    <?php echo CHtml::link("Check Out", array('../'),array('class' => 'checkin ui-link')); ?>
</div>
   <?php
            if(isset($_GET) && !empty($_GET)){
            $bus_route = BusRoute::model()->findByAttributes(array('id' => $_GET['key']));
            }?>
     <div class="select-wrap">
        <div class="select-content">
          <p class="heading"><?php echo $bus_route->route_name;?></p>
          <div class="sets places-wrap">
            <p style="font-size:16px"><strong>Check In at your Stop</strong></p><br/>
            <?php
            if(isset($_GET) && !empty($_GET)){
            $criteria = new CDbCriteria();
            $criteria->condition = 'route_id ='.$_GET['key'];
            $bus_stop = BusStop::model()->findAll($criteria);
            }
            foreach ($bus_stop as $value) { 
            ?>
            <?php $date = date('h:i', strtotime($value->time)); ?>
            <?php if(isset($value->created_time)){?>
            <div class="place-checkin" id="<?php echo 'place_'.$value->id;?>" data-id="<?php echo $value->id;?>"> <a class="clickable-place oncheck " href="#"><em><?php echo date('h:i A',strtotime($value->created_time));?></em>
            <ul>
            <li>
                <?php echo ucfirst($value->stop_name);?>
                <input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_" . $value->id ?>" value="<?php echo $value->id;?>" <?php if(isset($value->created_time)){echo "checked='checked'";} ?>/>
            </li>
            </ul> 
            </a>
            </div>
            <?php } else { ?>
                <div class="place-checkin" id="<?php echo 'place_'.$value->id;?>" data-id="<?php echo $value->id;?>"> <a class="clickable-place default " href="#">
            <ul>
            <li>
                <?php echo ucfirst($value->stop_name); ?>
                <input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_" . $value->id ?>" value="<?php echo $value->id;?>"/>

            </li>
            </ul> 
            </a>
            </div>
            <?php } ?>

            <?php } ?>
        </div>
        </div>
    </div>
</section>
       
  
 

<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl; ?>">
<input type="hidden" id="bus_route" value="<?php echo $_GET['key']; ?>">

<script type="text/javascript">

var baseurl; 

$(document).ready(function() {
    baseurl = $('#url').val();
    $('.place-checkin').click(function(){
        var data_id = $(this).attr('data-id');
        getValue(data_id);
    });

    $('.chk').click(function(){
        var clicked_value = $(this).val();
        if ($(this).is(':checked')){
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
        getValue(clicked_value);
        return false;
    });

   
    
});

    function getValue(data_id){
        var checkbox = $('#route_chk_'+data_id);
        if (checkbox.is(':checked') == false) {

                var value = $('#route_chk_'+data_id).val();
                console.log(value);
                var route_id = $('#bus_route').val();
                $.ajax({
                    type: 'POST',
                    url: baseurl + '/busroute/addCheckedTime',
                    data: {value: value,route_id:route_id},
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(index, order) {
                            $('#route_chk_'+order).prop('checked',true);
                            //$('#place_'+order a)
                            $('#place_'+order+' a').removeClass('default');
                            $('#place_'+order+' a').addClass('oncheck');
                        });
                        
                    }
                });
            } else {
                var value = checkbox.val();
                $.ajax({
                    type: 'POST',
                    url: baseurl + '/busroute/removeCheckedTime',
                    data: {value: value},
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(index, order) {
                            $('#route_chk_'+order).prop('checked',false);
                            $('#place_'+order+' a').removeClass('oncheck');
                            $('#place_'+order+' a').addClass('default');
                        });
                        
                    }
                });
            }
    }
</script>