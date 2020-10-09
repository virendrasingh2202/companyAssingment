<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\Router;

class RouterController extends \yii\web\Controller
{

	public $enableCsrfValidation = false;

    public function actionIndex()
    {    	
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = Router::find()->where(['is_active' => 1])->all();
    	if(count($model) > 0){
    		return array('status' => true,'total' => count($model), 'data' => $model);
    	}
    	else{
    		return array('status' => false,'total' => 0, 'data' => 'No data found.');
    	}

    }

    /**
     * Displays a single RouterDetails model.
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
     * Displays a single RouterDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionGetBySapid($sapid)
    {
    	$sapid = preg_replace("/\s+/", ",", $sapid);
    	$sapid = explode(',', preg_replace("/\s+/", "", $sapid));
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = Router::find()->where(['in', 'sapid', $sapid])->all(); 
        if(count($model) > 0){
    		return array('status' => true,'total' => count($model), 'data' => $model);
    	}
    	else{
    		return array('status' => false,'total' => 0, 'data' => 'No data found.');
    	}
    }
    
    /**
     * Displays a single RouterDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionGetByIp($loopback)
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$loopback = preg_replace("/\s+/", ",", $loopback);
    	$loopback = explode(',', preg_replace("/\s+/", "", $loopback));
    	$model = Router::find()->where(['in', 'loopback', $loopback])->all(); 
        if(count($model) > 0){
    		return array('status' => true,'total' => count($model), 'data' => $model);
    	}
    	else{
    		return array('status' => false,'total' => 0, 'data' => 'No data found.');
    	}
    }

    /**
     * Creates a new RouterDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$model = new Router();
        $model->scenario = Router::SCENARIO_CREATE;
        $model->attributes = Yii::$app->request->post();      
        $model->created_by = 1;  
        if ($model->validate() && $model->save()) {
            return array('status' => true);
        }else
        {
        	return array('status' => false, 'data' => $model->getErrors());
        }

    }

    /**
     * Updates an existing Router model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($loopback)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Router::find()->where(['loopback' => $loopback])->one();        
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
     * Updates an existing Router model.
     * If update is successful, the api will return successfull.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($loopback)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Router::find()->where(['loopback' => $loopback])->one();        
        $model->is_active = 0;  
        if ($model->save()) {
            return array('status' => true, 'data' => 'Recored Deleted.');
        }else
        {
        	return array('status' => false, 'data' => $model->getErrors());
        }
    }


    /**
     * Finds the Router model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RouterDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Router::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
