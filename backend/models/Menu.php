<?php

namespace backend\models;

use baseapp\passport\models\PassportModel;
use common\models\TraitMenu;

/**
 * This is the model class for table "menu".
 */
class Menu extends PassportModel
{
    use TraitMenu;

    public static function tableName()
    {
        return '{{%auth_menu}}';
    }

    public function beforeUpdate()
    {
        parent::beforeSave($insert);
        $code = $this->oldAttributes['code'];
        $this->removePermission($code);

        return true;
    }

    public function getModuleInfos()
    {
		return $this->_getModuleDatas('backend');
	}

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $code = $this->attributes['code'];
        $manager = \Yii::$app->getAuthManager();
        $permission = $manager->getPermission($code);
        if ($permission) {
            return true;
        }

        $permission = $manager->createPermission($code);
        $manager->add($permission);

        return true;
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $code = $this->attributes['code'];

        $this->removePermission($code);
    }

    protected function removePermission($code)
    {
        $manager = \Yii::$app->getAuthManager();
        $permission = $manager->getPermission($code);
        if ($permission) {
            $manager->remove($permission);
        }

        return ;
    }
}
