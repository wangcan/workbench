<?php

namespace backend\models;

use baseapp\passport\models\PassportModel;
use baseapp\auth\models\SigninTrait;

class Signin extends PassportModel
{
	use SigninTrait;

    /**
     * Finds user by [[name]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Manager::findByName($this->name);
        }

        return $this->_user;
    }
}