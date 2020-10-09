<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "emp_contact_details".
 *
 * @property int $id
 * @property int $emp_id
 * @property string $phone
 * @property string $address
 * @property int $is_active
 */
class EmpContactDetails extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_contact_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'emp_id', 'phone', 'address'], 'required'],
            [['id', 'emp_id', 'is_active'], 'integer'],
            [['address'], 'string'],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'phone' => 'Phone',
            'address' => 'Address',
            'is_active' => 'Is Active',
        ];
    }
}
