<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ip_address_table".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $number
 * @property integer $created_at
 * @property integer $updated_at
 */
class IpAddressTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_address_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Địa chỉ IP',
            'number' => 'Số lần truy cập',
            'created_at' => 'Ngày truy cập lần đầu',
            'updated_at' => 'Truy cập lần cuối',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
