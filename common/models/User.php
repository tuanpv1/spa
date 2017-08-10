<?php

namespace common\models;

use common\helpers\CommonUtils;
use common\helpers\CUtils;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $phone_number
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $type
 * @property integer $gender
 * @property string $birthday
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property News[] $news
 * @property UserActivity[] $userActivities
 * @property UserToken[] $userTokens
 * @property UserFollowing[] $follows
 */
class User extends ActiveRecord implements IdentityInterface
{
    const TYPE_ADMIN = 1;
    const TYPE_USER = 2;            // tai khoan cua nguoi dung

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 10;

    // add by TuanPham

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    public static function listGender()
    {
        $lst = [
            self::GENDER_MALE => 'Nam',
            self::GENDER_FEMALE => 'Nữ',
        ];
        return $lst;
    }

    public static function getGenderName($type)
    {
        $lst = self::listGender();
        if (array_key_exists($type, $lst)) {
            return $lst[$type];
        }
        return $type;
    }

    public static function getOld($birthday)
    {
        if($birthday != null) {
            $y = date('Y', strtotime($birthday));
            $ynow = date('Y');
//        echo "<pre>";
//        print_r($ynow);
//        die();
            $old = $ynow - $y;
            return $old;
        }
        else {
            return null;
        }
    }

    public $access_token;
    /*
    * @var string password for register scenario
    */
    public $password;
    public $confirm_password;
    public $new_password;
    public $old_password;
    public $file_excel;
    public $setting_new_password;

    public function scenarios()
    {

        return ArrayHelper::merge(parent::scenarios(), [
            'user-setting' => ['setting_new_password', 'old_password', 'confirm_password'],

        ]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
            [['auth_key', 'password_hash'], 'required'],

            ['username', 'filter', 'filter' => 'trim'],
            [['username'], 'required', 'on' => 'create', 'message' => Yii::t('app','{attribute} không được để trống')],
            [['username'], 'unique', 'on' => 'create', 'message' => Yii::t('app','{attribute} đã tồn tại, vui lòng chọn {attribute} khác!'),'filter' =>
                [
                    'status'=>User::STATUS_ACTIVE.'&&',
                ],
            ],
            [['username'], 'string', 'on' => 'create', 'min' => 2, 'max' => 255],


            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => Yii::t('app','{attribute} không được để trống')],
            ['email', 'email','message'=>Yii::t('app','{attribute} không hợp lệ!')],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'on' => 'create', 'message' => Yii::t('app','{attribute} đã tồn tại, vui lòng chọn {attribute} khác!'),'filter' =>
                [
                    'status'=>User::STATUS_ACTIVE.'&&',
                ],
            ],
//            ['email', 'unique', 'on' => 'create', 'message' => 'Địa chỉ Email đã tồn tại.'],

            [['birthday'], 'safe'],
            [['role', 'status', 'created_at', 'updated_at', 'gender', 'type'], 'integer'],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['fullname'], 'string', 'max' => 512],
            [['auth_key','phone_number'], 'string', 'max' => 32],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['birthday', 'default', 'value' => null],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_INACTIVE]],
            ['password', 'string', 'min' => '6', 'tooShort' => 'Mật khẩu phải tối thiểu 6 ký tự'],
            ['password', 'checkPassword', 'on' => 'create'],

            ['old_password', 'string'],
            ['confirm_password', 'string'],
            ['new_password', 'string', 'min' => '6', 'tooShort' => 'Mật khẩu phải tối thiểu 6 ký tự'],
            [['confirm_password'], 'required', 'message' => 'Xác nhận mật khẩu không được để trống.', 'on' => 'create'],
            [['password'], 'required', 'message' => 'Mật khẩu không được để trống.', 'on' => 'create'],
            [
                ['confirm_password'],
                'compare',
                'compareAttribute' => 'password',
                'message' => 'Xác nhận mật khẩu chưa đúng.',
                'on' => 'create'
            ],
            [
                ['confirm_password'],
                'compare',
                'compareAttribute' => 'new_password',
                'message' => 'Xác nhận mật khẩu chưa đúng.',
                'on' => 'change-password'
            ],
            [['new_password'], 'required', 'message' => Yii::t('app','{attribute} không được để trống'), 'on' => 'change-password'],
            [['confirm_password'], 'required', 'message' => 'Xác nhận mật khẩu không được để trống.', 'on' => 'change-password'],
            [['file_excel'], 'file', 'extensions' => 'xlsx, xls'],


            [['file_excel', 'setting_new_password', 'old_password'],'safe'],
            [['old_password'], 'required', 'message'=>Yii::t('app','{attribute} không được để trống'),'on' => 'user-setting'],
            ['old_password', 'validator_password','on' => 'user-setting'],
            [['setting_new_password'], 'required', 'message'=>Yii::t('app','{attribute} không được để trống'),'on' => 'user-setting'],
            ['setting_new_password','checkNewPassword','on' => 'user-setting'],
            [['confirm_password'], 'required', 'message' => Yii::t('app','{attribute} không được để trống'),'on' => 'user-setting'],
            [
                ['confirm_password'],
                'compare',
                'compareAttribute' => 'setting_new_password',
                'message' => 'Xác nhận mật khẩu mới không đúng.',
                'on' => 'user-setting'
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
            'username' => Yii::t('app', 'Tên đăng nhập'),
            'fullname' => Yii::t('app', 'Tên đầy đủ'),
            'user_code' => Yii::t('app', 'User Code'),
            'phone_number' => Yii::t('app', 'Số điện thoại'),
            'email' => Yii::t('app', 'Email'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'role' => Yii::t('app', 'Role'),
            'status' => Yii::t('app', 'Trạng thái'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'type' => Yii::t('app', 'Type'),
            'setting_new_password' => Yii::t('app', 'Mật khẩu mới'),
            'old_password' => Yii::t('app', 'Mật khẩu cũ'),
            'confirm_password' => Yii::t('app', 'Xác nhận mật khẩu'),
            'new_password' => Yii::t('app', 'Mật khẩu mới'),
            'gender' => Yii::t('app', 'Giới tính'),
            'birthday' => Yii::t('app', 'Ngày sinh'),
        ];
    }

    public function checkNewPassword($attribute)
    {
        if (strlen($this->setting_new_password) < '6') {
            $this->addError('setting_new_password', 'Mật khẩu phải chứa tối thiểu 6 ký tự.');
        }
//        elseif(!preg_match("@[0-9]@",$this->setting_new_password)) {
//            $this->addError('setting_new_password', 'Mật khẩu phải chứa ít nhất 1 số.');
//        } elseif(!preg_match("@[A-Z]@",$this->setting_new_password)) {
//            $this->addError('setting_new_password', 'Mật khẩu phải chứa ít nhất 1 chữ viết hoa.');
//        }
    }

    public function checkPassword($attribute)
    {
        if (strlen($this->password) < '6') {
            $this->addError('password', 'Mật khẩu phải chứa tối thiểu 6 ký tự.');
        }
//        elseif(!preg_match("@[0-9]@",$this->password)) {
//            $this->addError('password', 'Mật khẩu phải chứa ít nhất 1 số.');
//        } elseif(!preg_match("@[A-Z]@",$this->password)) {
//            $this->addError('password', 'Mật khẩu phải chứa ít nhất 1 chữ viết hoa.');
//        }
    }

    public function validator_password($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this->validatePassword($this->old_password)) {
                $this->addError('old_password', 'Mật khẩu cũ không đúng.');
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('{{%auth_assignment}}', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollows()
    {
        return $this->hasMany(UserFollowing::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserActivities()
    {
        return $this->hasMany(UserActivity::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTokens()
    {
        return $this->hasMany(UserToken::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => [self::STATUS_ACTIVE]]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $userToken = UserToken::findByAccessToken($token);
        if ($userToken) {
            $user = $userToken->getUser();
            if ($user) {
                $user->access_token = $token;
            }

            return $user;
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => [self::STATUS_ACTIVE]]);
    }

    public static function findByUsernameActive($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByAdminUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE,
            'type' => [self::TYPE_ADMIN]]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * ******************************** MY FUNCTION ***********************
     */

    /**
     * @return ActiveDataProvider
     */
    public function getAuthItemProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->getAuthItems()
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems()
    {
        return AuthItem::find()->andWhere(['name' => AuthAssignment::find()->select(['item_name'])->andWhere(['user_id' => $this->id])]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissingRoles()
    {
        $roles = AuthItem::find()->andWhere(['type' => AuthItem::TYPE_ROLE])
            ->andWhere('name not in (select item_name from auth_assignment where user_id = :id)', [':id' => $this->id]);

        return $roles->all();
    }

    /**
     * @return string
     */
    public function getRolesName()
    {
        $str = "";
        $roles = $this->getAuthItems()->all();
        $action = 'rbac/update-role';
        foreach ($roles as $role) {
            $res = Html::a($role['description'], [$action, 'name' => $role['name']]);
            $res .= " [" . sizeof($role['children']) . "]";
            $str = $str . $res . '  ,';
        }
        return $str;
    }

    /**
     * @return array
     */
    public static function listType()
    {
        $lst = [
            self::TYPE_ADMIN => 'Admin',
            self::TYPE_USER => 'Người dùng',
        ];
        return $lst;
    }

    public static function getTypeNameByID($type)
    {
        $lst = self::listType();
        if (array_key_exists($type, $lst)) {
            return $lst[$type];
        }
        return $type;
    }

    /**
     * @return int
     */
    public function getTypeName()
    {
        $lst = self::listType();
        if (array_key_exists($this->type, $lst)) {
            return $lst[$this->type];
        }
        return $this->type;
    }

    /**
     * @return array
     */
    public static function listStatus()
    {
        $lst = [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Tạm khóa',
//            self::STATUS_DELETED => 'Bị xóa',
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

    public static function checkUser($username, $pass)
    {
        $user = User::findOne(['username' => $username]);
        if ($user) {
            if ($user->validatePassword($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


    public static function newUser($username, $password, $type, $full_name, $phone_number, $email)
    {
        $user = new User();
        $user->username = $username;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->fullname = $full_name;
        $user->phone_number = $phone_number;
        $user->email = $email;
        $user->type = $type;
        $user->password_reset_token = $password;
        if ($type == User::TYPE_USER) {
            $user->status = User::STATUS_ACTIVE;
        }
//        else {
//            $user->status = User::STATUS_WAITING;
//        }
        $user->setPassword($password);

        if ($user->save()) {
            return $user;
        } else {
            Yii::error($user->getErrors());
            return null;
        }

    }

    public function getName()
    {
        return $this->fullname ? $this->fullname : $this->username;
    }

    public function generateAccessToken()
    {
        $userToken = new UserToken();
        $userToken->token = Yii::$app->security->generateRandomString();
        $userToken->user_id = $this->id;
        $userToken->created_at = time();
        $userToken->expired_at = time() + 30 * 86400;
        $userToken->status = UserToken::STATUS_ACTIVE;

        if ($userToken->save()) {
            return $userToken->token;
        }

        return null;

    }

    public function totalMyCampaign()
    {
        return $this->getCampaigns()->count();
    }

    public function totalRequestToMe()
    {
        return $this->getDonationRequestsTo()->count();
    }

    /**
     * @param $followed User
     * @return bool|int
     * @throws \Exception
     */
    public function followUser($followed)
    {
        $userFollowing = UserFollowing::find()->andWhere(['user_id' => $this->id])->andWhere(['user_followed_id' => $followed->id])->one();
        if ($userFollowing) {
            $userFollowing->delete();
            return 1;
        }
        $userFollow = new UserFollowing();
        $userFollow->user_id = $this->id;
        $userFollow->user_followed_id = $followed->id;
        return $userFollow->save();
    }
}
