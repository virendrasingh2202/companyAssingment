<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;


use Yii;
use app\models\RouterDetails;
use app\models\RouterDetailsSearch;
use yii\console\Controller;
use yii\console\ExitCode;
use ourren\yii2ssh\Yii2ssh;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RouterController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }


    public function actionGenerateRouterDetails($generation_count = 1)
    {
        if($generation_count > 0){            
            for ($i=0; $i < $generation_count; $i++) { 
                $model = new RouterDetails();
                $model->sapid = $this->sapid();
                $model->hostname = $this->hostname();
                $model->loopback = $this->loopback();
                $model->mac_address = $this->mac_address();
                $model->created_by = 1;
                if ($model->save()) {
                    echo 'saved : '.$i;
                }
            }
        }


    }

    public function checkUnique($attr, $value)
    {
         $model = RouterDetails::find()->where([$attr => $value])->one();
        if($model)
            return true;
        else
            return false;
    }
    public function sapid()
    {
        $sapid = 'MHMH'.$this->random_strings(14);
        if($this->checkUnique('sapid', $sapid))
            $this->sapid();
        else
            return $sapid;
    }
    public function hostname()
    {
        $hostname = 'MHLI'.$this->random_strings(10);
        if($this->checkUnique('hostname', $hostname))
            $this->hostname();
        else
            return $hostname;
    }
    public function loopback()
    {
        $loopback = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
        if($this->checkUnique('loopback', $loopback))
            $this->loopback();
        else
            return $loopback;
    }
    public function mac_address()
    {
        $mac_address = 'MHCG'.$this->random_strings(13);
        if($this->checkUnique('mac_address', $mac_address))
            $this->mac_address();
        else
            return $mac_address;
    }

    public function random_strings($length_of_string) 
    { 
      
        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      
        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result),  
                           0, $length_of_string); 
    } 

    public function actionConnect()
    {
        $host = "127.0.0.1";
        echo $host;
        $auth['username'] = 'root';
        $auth['password'] = 'root';
        $yii_ssh = new Yii2ssh($host, $auth);
        if($yii_ssh->connect($host, $auth, 80))
        {
            $yii_ssh->run([
                'ls -al',
            ], function($line) {
                echo $line;
            });
        }
    }
}
