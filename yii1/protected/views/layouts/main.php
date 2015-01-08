<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- blueprint CSS framework -->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <?php
        $script = Yii::app()->clientScript;
        $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/themes/default/jquery.mobile-1.2.1.min.css');
        $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/style.css');
        $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
        $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.mobile-1.2.1.min.js');
        ?>
        

        <title><?php echo "Leapfrog Bus Route";?></title>
    </head>

    <body>

       <div class="container" data-role="page">
  <div data-role="header">
    <header>
      <div class="logo">
        <h1>Leapfrog Technology</h1>
      </div>
      <!--end of logo--> 
      
    </header>
  </div>
  <!-- /header -->
  
            <div class="content" data-role="content">
                <?php  echo $content; ?>
            </div>

            <div class="clear"></div>

<div data-role="footer">
    <footer>
      <p>Copyright © 2013 Leapfrog Technology, Inc. All rights reserved.</p>
    </footer>
  </div>
  <!-- /header --> 
  

        </div><!-- page -->

    </body>
</html>
