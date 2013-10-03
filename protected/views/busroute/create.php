<head>
<?php
$script = Yii::app()->clientScript;
$script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/themes/default/jquery.mobile-1.2.1.min.css');
$script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/style.css');
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.mobile-1.2.1.min.js');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Leapfrog Bus Route</title>
</head>

<body>
<div class="conatiner" data-role="page">
  <div data-role="header">
    <header>
      <div class="logo"> <a href="index.html">
        <h1>Leapfrog Technology</h1>
        </a> </div>
      <!--end of logo-->
      
      <div class="menu"> <a class="home-icon" href="index.html">Home</a> </div>
    </header>
  </div>
  <!-- /header -->
  
  <div class="content" data-role="content">
  
    <p><?php echo CHtml::link("Check Out", array('../')); ?></p>

<section>
     <div class="select-wrap">
        <div class="select-content">
          <p class="heading">Bhaktapur to Office</p>
          <div class="sets places-wrap">
            <?php
            if(isset($_GET) && !empty($_GET)){
            $criteria = new CDbCriteria();
            $criteria->condition = 'route_id ='.$_GET['key'];
            $bus_route = BusStop::model()->findAll($criteria);
            }
            foreach ($bus_route as $value) { 
            ?>
            <?php $date = date('h:i', strtotime($value->time)); ?>
            <?php if(isset($value->created_time)){?>
            <div class="place-checkin" id="<?php echo 'place_'.$value->id;?>" data-id="<?php echo $value->id;?>"> <a class="clickable-place oncheck " href="#">
            <ul>
            <li>
                <?php echo ucfirst($value->stop_name); ?>
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
       
  
  </div>
  <!-- /content -->
  
  <div data-role="footer">
    <footer>
      <p>Copyright @ Leapfrog Technology.com</p>
    </footer>
  </div>
  <!-- /header --> 
  
</div>
<!-- /page -->
</body>
</html>

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
        console.log(checkbox);
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