<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

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
 * @property integer $type
 * @property string $url
 */
class AffiliateCompany extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;

    const TYPE_UNITLINK = 1;
    const TYPE_DOITAC = 2;

    public static function listStatus()
    {
        $lst = [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Tạm dừng',
        ];
        return $lst;
    }

    public static function getTypeName($type =  AffiliateCompany::TYPE_UNITLINK){
        if($type == AffiliateCompany::TYPE_UNITLINK){
            return 'Quản lý công ty liên kết';
        }else{
            return 'Quản lý đối tác';
        }
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
            [['status', 'created_at', 'updated_at','type'], 'integer'],
            [['image', 'name', 'about', 'url'], 'string', 'max' => 255],
            ['image','required','message'=>Yii::t('app','{attribute} không được để trống'),'on'=>'create'],
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

    public function getImage()
    {
        $image = $this->image;
        if ($image) {
            return Url::to(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_affiliate_company') . '/' . $image, true);
        }
    }
}
