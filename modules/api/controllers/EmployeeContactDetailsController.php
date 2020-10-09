<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\EmployeeContactDetails;

class EmployeeContactDetailsController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {    	
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = EmployeeContactDetails::find()->where(['is_active' => 1])->all();
    	if(count($model) > 0){
    		return array('status' => true,'total' => count($model), 'data' => $model);
    	}
    	else{
    		return array('status' => false,'total' => 0, 'data' => 'No data found.');
    	}

    }

    /**
     * Displays a single EmployeeContactDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);
         if(count($model) > 0){
    		return array('data' => $model);
    	}
    	else{
    		return array('data' => 'No data found.');
    	}
    }
    
    /**
     * Creates a new EmployeeContactDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = new EmployeeContactDetails();
        $model->attributes = Yii::$app->request->post();      
        if ($model->validate() && $model->save()) {
  	        return array('status' => true, 'message' => 'Employee Contact Details added successfully');
    	}else
        {
        	return array('status' => false, 'message' => $model->getErrors());
        }

    }

    /**
     * Updates an existing EmployeeContactDetails model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);       
        $model->attributes = Yii::$app->request->post();
        if ($model->validate() && $model->save()) {
  	        return array('status' => true, 'message' => 'Employee Contact Details updated successfully');
  	    }else
        {
        	return array('status' => false, 'message' => $model->getErrors());
        }
    }

    /**
     * Updates an existing EmployeeContactDetails model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);        
        $model->is_active = 0;  
        if ($model->save()) {
            return array('status' => true, 'data' => 'Recored Deleted.');
        }else
        {
        	return array('status' => false, 'data' => $model->getErrors());
        }
    }


    /**
     * Finds the EmployeeContactDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeeContactDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeeContactDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
