<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use baseapp\auth\models\AuthBase;

/**
 * This is the model class for table "manager".
 */
class Manager extends AuthBase
{
    const STATUS_NOACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_LOCK = 99;

    public $role;
    public $password_new_repeat;
    public $oldpassword;
    public $password_new;

    public function getBehaviorCodes()
    {
        return array_merge(parent::getBehaviorCodes(), ['timestamp']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_manager}}';
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'create' => ['name', 'email', 'truename', 'password_new', 'password_new_repeat', 'status', 'auth_role', 'role'],
            'update' => ['name', 'email', 'truename', 'password_new', 'password_new_repeat', 'status', 'auth_role', 'role'],
            'edit-info' => ['email', 'truename', 'mobile'],
            'edit-password' => ['oldpassword', 'password_new', 'password_new_repeat'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\backend\models\Manager', 'message' => 'This name has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            [['oldpassword'], 'required'],
            [['oldpassword'], 'checkOldPassword', 'on' => ['edit-password']],
            ['password_new', 'required', 'on' => ['create', 'edit-password']],
            ['password_new', 'string', 'min' => 6, 'when' => function($model) { return $model->password_new != ''; }],
            ['password_new', 'compare', 'on' => ['edit-password']],
            [['truename', 'email', 'mobile', 'status', 'role'], 'safe', 'on' => ['create', 'update']],
        ];
    }

    public function checkOldPassword()
    {
        $result = Yii::$app->security->validatePassword($this->oldpassword, $this->getOldAttribute('password'));
        if (!$result) {
            $this->addError('oldpassword', '旧密码错误');
        }
        if ($this->oldpassword == $this->password) {
            $this->addError('oldpassword', '新密码不能跟旧密码相同');
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '管理员账号',
            'role' => '角色',
            'truename' => '真实姓名',
            'login_num' => '登录次数',
            'password' => '密码',
            'oldpassword' => '旧密码',
            'password_new_repeat' => '确认密码',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'last_at' => '最后登录时间',
            'mobile' => '手机号',
            'email' => '邮箱',
            'status' => '状态',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->status = self::STATUS_NOACTIVE;
            }
            if (Yii::$app->controller->id == 'site') {
                return true;
            }
            if (!empty($this->password_new)) {
            $this->setPassword($this->password_new, 'password');
            }
            return true;
        }

        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        echo 'this';
        parent::afterSave($insert, $changedAttributes);

        if (Yii::$app->controller->id == 'entrance' || in_array($this->scenario, ['edit-info', 'edit-password'])) {
            return true;
        }
        $id = $this->attributes['id'];
        $manager = Yii::$app->getAuthManager();
        $manager->revokeAll($this->id);
        foreach ((array) $this->role as $roleName) {
            if (empty($roleName)) {
                continue;
            }
            $role = $manager->getRole($roleName);
            $manager->assign($role, $id);
        }

        return true;
    }

    public function getStatusInfos()
    {
        return [
            self::STATUS_ACTIVE => '正常',
            self::STATUS_NOACTIVE => '没激活',
            self::STATUS_LOCK => '锁定',
        ];
    }

    public function getRole()
    {
        $role = ArrayHelper::getColumn(Yii::$app->getAuthManager()->getRolesByUser($this->id), 'name');
        return $role;
    }

    public function getRoleStr()
    {
        return implode(',', (array) $this->getRole());
    }

    public function getRoleInfos()
    {
        $manager = Yii::$app->getAuthManager();
        $roles = $manager->getRoles();

        return array_combine(array_keys($roles), array_keys($roles));
    }

    public function getInfosByRoles($roles)
    {
        $ids = [];
        foreach ($roles as $role) {
            $idsTmp = Yii::$app->getAuthManager()->getUserIdsByRole($role);
            $ids = array_merge($ids, $idsTmp);
        }

        $infos = self::find()->where(['id' => $ids, 'status' => 1])->all();

        return $infos;
    }

    protected function _getTemplateFields()
    {
        return [
            'id' => ['type' => 'common'],
            'name' => ['type' => 'common'],
            'truename' => ['type' => 'common'],
            'role' => ['type' => 'inline', 'method' => 'getRoleStr'],
            'mobile' => ['type' => 'common'],
            'login_num' => ['type' => 'common'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
            'last_at' => ['type' => 'timestamp'],
            'last_ip' => ['type' => 'common', 'listNo' => true],
            'email' => ['type' => 'common', 'listNo' => true],
            'status' => ['type' => 'key'],
        ];
    }
}
