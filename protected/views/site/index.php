<!DOCTYPE html>
<html>
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
<!--<link href="css/themes/default/jquery.mobile-1.2.1.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">-->
<!--<link rel="stylesheet" href="docs/_assets/css/jqm-docs.css" />-->

<!--<script src="js/jquery.js"></script>
<script src="js/jquery.mobile-1.2.1.min.js"></script>-->
</head>
<body>
<div class="container" data-role="page">
  <div data-role="header">
    <header>
      <div class="logo">
        <a href="index.html"> <h1>Leapfrog Technology</h1></a>
      </div>
      <!--end of logo--> 
      
    </header>
  </div>
  <!-- /header -->
  
  <div class="content" data-role="content">
    <section>
      <div class="select-wrap">
        <div class="select-content">
          <p class="heading">Select Bus Route - <?php echo Yii::app()->name;?></p>
          <select>
          <?php
            $criteria = new CDbCriteria;
            $criteria->condition = "status='1'";
            $criteria->order = "route_name ASC";

            $route = BusRoute::model()->findAll($criteria);

            foreach ($route as $key => $value) {
                echo "<option value='" . $value->id . "'>$value->route_name ($value->bus_name)</option>";
            }
          ?>
          </select>
        </div>
        <!--end of select-content-->
        
        <div class="btn-wrap">
          <!--<input type="button" value="Check In">-->
          <!--<a href="checkin.html">Check In</a>-->
          <?php echo CHtml::link("Check In", array('confirm' => 'Please Select Route from the list'), array('class' => 'checkin')); ?>
        </div>
      </div>
      <!--end of select-wrap-->
      
      <div class="sets">
        <ul class="places-display" data-role="listview" data-inset="true">
          <li>Suryabinayak<em>8:00am</em></li>
          <li>Thimi<em>8:10am</em></li>
          <li>Koteshwor<em>8:200am</em></li>
          <li>Item 4 <em>8:30am</em></li>
          <li>Item 5</li>
          <li>Item 6</li>
        </ul>
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

<script type="text/javascript">
    $(document).ready(function() {
        var url = $('#url').val();
        $('.checkin').click(function() {
            var selectedValue = $(':selected').val();
            $.ajax({
                type: 'POST',
                url: url + '/busroute/getList',
                data: {value: selectedValue},
                dataType: "json",
                success: function(response) {

                    if (response.value) {

                        location.href = url + '/busroute/create?key=' + response.value;
                    }
                    else
                    {
                        alert('Please Select the Route from the list');
                    }
                }
            });
        });

        /**/
        $('select').change(function() {
            var selectedvalue = $(':selected').val();
            $.ajax({
                type: 'POST',
                url: url + '/busroute/getbusroute',
                dataType: 'html',
                data: {value: selectedvalue},
                success: function(data) {
                    $('.sets ul.places-display').html(data);

                },
            });
        });

        var selectedvalue = $(':selected').val();
        $.ajax({
            type: 'POST',
            url: url + '/busroute/getbusroute',
            dataType: 'html',
            data: {value: selectedvalue},
            success: function(data) {
                $('.sets ul.places-display').html(data);
            }
        });
    });
</script>

