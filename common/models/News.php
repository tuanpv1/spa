<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;


/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $url_video_new
 * @property string $title_ascii
 * @property string $content
 * @property string $thumbnail
 * @property integer $type
 * @property string $tags
 * @property string $short_description
 * @property string $description
 * @property string $video_url
 * @property string $video
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $comment_count
 * @property integer $favorite_count
 * @property integer $honor
 * @property string $source_name
 * @property string $source_url
 * @property integer $status
 * @property integer $created_user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $published_at
 * @property integer $user_id
 * @property integer $position
 * @property integer $all_village
 * @property integer $type_video
 * @property integer $lead_donor_id
 * @property string $price
 * @property integer $category_id
 * @property User $user
 * @property NewsCategoryAsm $newsCategoryAsms
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;

    const LIST_EXTENSION = '.jpg,.png';

    const TYPE_NEWS = 1;
    const TYPE_TIENDO = 2;
    const TYPE_DONOR = 3;
    const TYPE_PROJECT = 4;
    const TYPE_COMMON = 5;
    const TYPE_GIOITHIEU = 6;
    const TYPE_EXPERIENCE = 7;


    const POSITION_TOP = 1;
    const POSITION_NOTTOP = 2;

    public $village_array;
    public $category_id;
    public $select;

    // add by TP in 13/12/2016 update type_video display in slide home
    const TYPE_VIDEO = 1;// CÓ VIDEO
    const TYPE_NOT_VIDEO = 2;// không cÓ VIDEO
    // phân biệt để làm ẩn hiện khung tải video hay url
    const TYPE_UPLOAD_VIDEO = 1 ;// TẢI LÊN VIDEO
    const TYPE_URL = 2 ;// TẢI LÊN VIDEO
    public static function getTypeTP(){
        return $ls = [
            self::TYPE_UPLOAD_VIDEO  => 'Tải video',
            self::TYPE_URL  => 'Tải URL',
        ];
    }
    // end add

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
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
    public function rules()
    {
        return [
            [['type', 'view_count', 'like_count', 'comment_count', 'favorite_count', 'honor',
                'status', 'created_user_id', 'created_at', 'updated_at', 'user_id'
                , 'category_id', 'published_at','type_video','position'], 'integer'],
            [['title', 'user_id'], 'required'],
            [['video'], 'file', 'extensions' => ['doc', 'docx','pdf'], 'maxSize' => 1024 * 1024 * 500, 'tooBig' => 'Video vượt quá dung lượng cho phép!'],
            [['thumbnail'], 'required', 'on' => 'create'],
            [['content', 'description'], 'string'],
            [['title', 'title_ascii', 'thumbnail'], 'string', 'max' => 512],
            [['tags', 'source_name', 'source_url', 'price'], 'string', 'max' => 200],
            [['short_description','video','url_video_new'], 'string', 'max' => 500],
            [['video_url','select'],'safe'],
            [['thumbnail'], 'image', 'extensions' => 'png,jpg,jpeg,gif',
                'maxSize' => 1024 * 1024 * 10, 'tooBig' => 'Ảnh upload vượt quá dung lượng cho phép!'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Tiêu đề'),
            'title_ascii' => Yii::t('app', 'Title Ascii'),
            'content' => Yii::t('app', 'Nội dung'),
            'thumbnail' => Yii::t('app', 'Ảnh đại diện'),
            'type' => Yii::t('app', 'Loại bài viết'),
            'tags' => Yii::t('app', 'Tags'),
            'short_description' => Yii::t('app', 'Mô tả ngắn'),
            'description' => Yii::t('app', 'Mô tả'),
            'video_url' => Yii::t('app', 'Đường dẫn video'),
            'video' => Yii::t('app', 'Video'),
            'view_count' => Yii::t('app', 'View Count'),
            'like_count' => Yii::t('app', 'Like Count'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'favorite_count' => Yii::t('app', 'Favorite Count'),
            'honor' => Yii::t('app', 'Honor'),
            'source_name' => Yii::t('app', 'Source Name'),
            'source_url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Trạng thái'),
            'created_user_id' => Yii::t('app', 'Created User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
            'price' => Yii::t('app', 'Giá'),
            'category_id' => Yii::t('app', 'Danh mục'),
            'position' => Yii::t('app','Vị trí')
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategoryAsms()
    {
        return $this->hasMany(NewsCategoryAsm::className(), ['news_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_user_id']);
    }

    public function getThumbnailLink()
    {
        $pathLink = Yii::getAlias('@web') . '/' . Yii::getAlias('@image_new') . '/';
        $filename = null;

        if ($this->thumbnail) {
            $filename = $this->thumbnail;

        }
        if ($filename == null) {
            $pathLink = Yii::getAlias("@web/img/");
            $filename = 'bg_df.png';
        }

        return Url::to($pathLink . $filename, true);

    }

    /**
     * @return array
     */
    public static function listStatus()
    {
        $lst = [
            self::STATUS_NEW => 'Soạn thảo',
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Tạm dừng',
        ];
        return $lst;
    }

    /**
     * @return array
     */

    public static function listPosition(){
        $list = [
            self::POSITION_NOTTOP => 'Vị trí khác',
            self::POSITION_TOP => 'Vị trí top',
        ];
        return $list;
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

    public static function listStatusType()
    {
        $lst = [
            self::TYPE_COMMON => 'Dịch vụ cung cấp',
            self::TYPE_NEWS => 'Tin tức thám tử',
            self::TYPE_GIOITHIEU => 'Giới thiệu',
            self::TYPE_PROJECT => 'Tuyển dụng',
            self::TYPE_GIOITHIEU => 'Giới thiệu'
        ];
        return $lst;
    }

    public static function getTypeName($type)
    {
        $lst = self::listStatusType();
        if (array_key_exists($type, $lst)) {
            return $lst[$type];
        }
        return $type;
    }

    public function getImage()
    {
        $image = $this->thumbnail;
        if ($image) {
            return Url::to(Yii::getAlias('@web') . '/' . Yii::getAlias('@image_new') . '/' . $image, true);
        }
    }


}
