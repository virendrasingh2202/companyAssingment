<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "router_details".
 *
 * @property int $id
 * @property string $sapid
 * @property string $hostname
 * @property string $loopback
 * @property string $mac_address
 * @property int|null $is_active
 * @property string $created_at
 * @property int $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 */
class Router extends \yii\db\ActiveRecord
{

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'router_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sapid', 'hostname', 'loopback', 'mac_address', 'created_by'], 'required'],
            [['sapid', 'hostname', 'loopback', 'mac_address'], 'unique'],
            [['is_active', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sapid'], 'string', 'max' => 18],
            [['hostname'], 'string', 'max' => 14],
            [['loopback'], 'string', 'max' => 20],
            [['mac_address'], 'string', 'max' => 17],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sapid' => 'Sapid',
            'hostname' => 'Hostname',
            'loopback' => 'Loopback',
            'mac_address' => 'Mac Address',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['sapid', 'hostname', 'loopback', 'mac_address'];
        return $scenarios;
    }
}
