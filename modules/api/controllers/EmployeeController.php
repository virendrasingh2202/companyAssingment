<?php

namespace app\modules\api\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\modules\api\models\Employee;
use app\modules\api\models\EmployeeSearch;

class EmployeeController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {    	
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	
    	$provider = Employee::getAll();

    	if($provider->getCount() > 0){
    		return array('status' => true,'total' => $provider->getCount(), 'data' => $provider->getModels());
    	}
    	else{
    		return array('status' => false,'total' => 0, 'data' => 'No data found.');
    	}

    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return array('data' => $this->findModel($id));
    }
    
    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = new Employee();
        $model->attributes = Yii::$app->request->post();      
        $model->created_by = 1;  
        if ($model->validate() && $model->save()) {
  	        return array('status' => true, 'message' => 'Employee added successfully');
    	}else
        {
        	return array('status' => false, 'message' => $model->getErrors());
        }

    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Employee::find()->where(['loopback' => $loopback])->one();        
        $model->attributes = Yii::$app->request->post();
        $model->updated_by = 1;  
        if ($model->save()) {
            return array('status' => true);
        }else
        {
        	return array('status' => false, 'data' => $model->getErrors());
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($loopback)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Employee::find()->where(['loopback' => $loopback])->one();        
        $model->is_active = 0;  
        if ($model->save()) {
            return array('status' => true, 'data' => 'Recored Deleted.');
        }else
        {
        	return array('status' => false, 'data' => $model->getErrors());
        }
    }


    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
