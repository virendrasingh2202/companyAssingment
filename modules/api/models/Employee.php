<?php

namespace app\modules\api\models;

use Yii;
use yii\data\ArrayDataProvider;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $first_name
 * @property int $last_name
 * @property int $email
 * @property int|null $department_id
 * @property string $designation
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property int $is_active
 * @property string|null $updated_at
 */
class Employee extends \yii\db\ActiveRecord
{    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'department_id', 'designation', 'created_by'], 'required'],
            [['department_id', 'created_by', 'updated_by', 'is_active'], 'integer'],
            [['email'], 'unique'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'designation'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'department_id' => 'Department',
            'designation' => 'Designation',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'is_active' => 'Is Active',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getAll()
    {
        $params = Yii::$app->request->queryParams;

        $perPage = $params['per-page'] ?? 0;
        $page = $params['page'] ?? 0;
        $params = self::validParameters($params);
        $params['is_active'] = 1; 
        
        $data = Employee::find()->where($params)->asArray()->all();
        $provider = new ArrayDataProvider([
          'allModels' => $data,
          'pagination' => [
             'pageSize' => $perPage,
             'page' => $page,
          ],
          'sort' => [
             'attributes' => ['id'],
          ],
        ]);
       return $provider;
    }

    public static function validParameters($params)
    {
        $condition = [];
        if (count($condition) > 0) {
            $validArray = ['id','first_name', 'last_name', 'email', 'department_id', 'designation'];
            $validArray = array_intersect(array_keys($params), $validArray);
            foreach ($validArray as $key) {
                $condition[$key] = $params[$key];
            }
        }

        return $condition;
    }
}
