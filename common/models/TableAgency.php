<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "table_agency".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $phone_number
 * @property integer $created_at
 * @property integer $updated_at
 */
class TableAgency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_agency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','phone_number'],'required','message'=>Yii::t('app','{attribute} không được để trống'),'on'=>'create'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['phone_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên nhà phân phối',
            'status' => 'Trạng thái',
            'phone_number' => 'Số điện thoại',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    const STATUS_ACTIVE = 10; // hien
    const STATUS_BLOCK = 1; //an
    const STATUS_DELETED= 0; //an
    public  function  getListStatus(){
        $list1 = [
            self::STATUS_ACTIVE => 'Hiện',
            self::STATUS_BLOCK => 'Ẩn',
        ];

        return $list1;
    }

    public function getStatusName()
    {
        $lst = self::getListStatus();
        if (array_key_exists($this->status, $lst)) {
            return $lst[$this->status];
        }
        return $this->status;
    }
}
