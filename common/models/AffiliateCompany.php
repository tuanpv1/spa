<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "affiliate_company".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $about
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $url
 */
class AffiliateCompany extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;

    public static function listStatus()
    {
        $lst = [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Tạm dừng',
        ];
        return $lst;
    }

    /**
     * @return int
     */
    public function getStatusName()
    {
        $lst = self::listStatus();
        if (array_key_exists($this->status, $lst)) {
            return $lst[$this->status];
        }
        return $this->status;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'affiliate_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['image', 'name', 'about', 'url'], 'string', 'max' => 255],
            ['name','required','message'=>Yii::t('app','{attribute} không được để trống')],
            ['url','required','message'=>Yii::t('app','{attribute} không được để trống')],
            ['image','required','message'=>Yii::t('app','{attribute} không được để trống')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => Yii::t('app','Ảnh đại diện'),
            'name' => Yii::t('app','Tên công ty'),
            'about' => Yii::t('app','Giới thiệu'),
            'status' => Yii::t('app','Trạng thái'),
            'created_at' => Yii::t('app','Ngày tạo'),
            'updated_at' => Yii::t('app','Ngày thay đổi thông tin'),
            'url' => Yii::t('app','Địa chỉ website'),
        ];
    }
}
