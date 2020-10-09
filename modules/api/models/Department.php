<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property int $is_active
 */
class Department extends \yii\db\ActiveRecord
{    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'location'], 'required'],
            [['id', 'is_active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['location'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'is_active' => 'Is Active',
        ];
    }
}
