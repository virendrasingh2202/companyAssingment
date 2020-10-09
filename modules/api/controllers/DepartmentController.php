<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\Department;

class DepartmentController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {    	
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = Department::find()->where(['is_active' => 1])->all();
    	if(count($model) > 0){
    		return array('total' => count($model), 'result' => $model);
    	}
    	else{
    		return array('total' => 0, 'result' => 'No data found.');
    	}

    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = $this->findModel($id);
        if(isset($model)){
    		return array('result' => $model);
    	}
    	else{
    		return array('result' => $model->getErrors());
    	}
    }
    
    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = new Department();
        $model->attributes = Yii::$app->request->post();      
        if ($model->validate() && $model->save()) {
            return array('status' => true, 'result' => 'Department created successfully');
        }else
        {
        	return array('status' => false, 'result' => $model->getErrors());
        }

    }

    /**
     * Updates an existing Department model.
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
  	        return array('status' => true, 'result' => 'Department updated successfully');
  	    }else
        {
        	return array('status' => false, 'result' => $model->getErrors());
        }
    }

    /**
     * Updates an existing Department model.
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
            return array('status' => true, 'result' => 'Record Deleted.');
        }else
        {
        	return array('status' => false, 'result' => $model->getErrors());
        }
    }


    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
