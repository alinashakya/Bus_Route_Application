<?php

class BusrouteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			/*array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BusRoute;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusRoute']))
		{
			$model->attributes=$_POST['BusRoute'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusRoute']))
		{
			$model->attributes=$_POST['BusRoute'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BusRoute');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BusRoute('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BusRoute']))
			$model->attributes=$_GET['BusRoute'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BusRoute the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BusRoute::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BusRoute $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bus-route-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGetList(){
		$value = $_POST['value'];
		$array = array('value' => $value);
		echo json_encode($array);
	}

	/*public function actionAddCheckedTime(){
		$value = $_POST['value'];
		$model = new BusStop();
		$model = BusStop::model()->findByPk($value);
		//print_r($model->attributes);die;
		if($model){
			$model->created_time = date('Y-m-d H:i:s');
			$model->update();
		}
	}*/

	public function actionAddCheckedTime(){
		$value = $_POST['value'];
		$checkId = $this->checkValue($value);
		//$array = array('msg' => "true");
		//echo json_encode($array);
		/*$model = new BusStop();
		$model = BusStop::model()->findByPk($value);
		
		if($model){
			$model->created_time = date('Y-m-d H:i:s');
			$model->update();
		}*/
	}

	public function checkValue($val){
		for($i = 3; $i <= $val ; $i++){
			$model = BusStop::model()->findByAttributes(array('id' => $i));
			//print_r($model->attributes);
			if($model->created_time == NULL){
				$model->created_time = date('Y-m-d H:i:s');
				$model->update();
			}
		}
		return $i;
	}

	public function actionRemoveCheckedTime(){
		$value = $_POST['value'];
		$model = BusStop::model()->findByPk($value);
		if($model){
			$model->created_time = NULL;
			$model->update();
		}
	}

}
