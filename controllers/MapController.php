<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class MapController extends Controller
{

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionDMStoDEC($deg, $min, $sec)
	{
		die('test');
// Converts DMS ( Degrees / minutes / seconds )
// to decimal format longitude / latitude

		return $deg + ((($min * 60) + ($sec)) / 3600);
	}

	public function actionChangedmstolatitude()
	{
		$deg = 27;
		$min = 38;
		$sec = 51.917;
		$lat = $deg + ($min);
		$latitude = $deg + ((($min * 60) + ($sec)) / 3600);
		echo $latitude;
		die();
	}

	public function actionChangedmstolongitude()
	{
		$deg = 85;
		$min = 20;
		$sec = 0.196;
		$longitude = $deg + ((($min * 60) + $sec) / 3600);
		echo $longitude;
		die;
	}

}
