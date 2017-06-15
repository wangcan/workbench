<?php
namespace baseapp\auth\models;

use Yii;

trait SigninTrait
{
    protected $_user;

    /**
     * Logs in a user using the provided name and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function _signin()
    {
        $this->load(Yii::$app->request->post(), '');
        $validate = $this->validate();
        if (empty($validate)) {
            return $this->_formatFailResult('登录失败，请您重试');
        }

        $loginResult = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
		if (!$loginResult) {
		    return ['status' => 400, 'message' => '登录失败'];
		}

        $identity = Yii::$app->user->getIdentity();
        $identity->last_at = Yii::$app->params['currentTime'];
        $identity->last_ip = Yii::$app->request->getIp();
        $identity->login_num = $identity->login_num + 1;
        $identity->update(false);

	    $this->wrongTimes('clear');
		return ['status' => 200, 'message' => 'OK', 'identity' => $identity];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $user = $this->getUser();
		if (!$user) {
            $this->addError('mobile', '用户不存在');
			return ;
		}

        if (!$user->validatePassword($this->password)) {
			$this->wrongTimes('write');
            $this->addError('password', '密码错误');
        }
    }

	public function wrongTimes($action) 
	{
        $session = Yii::$app->getSession();
        $session->open();
        $name = "_login_count";

		switch ($action) {
		case 'write':
			$count = isset($session[$name]) ? $session[$name] + 1: 1;
			$session[$name] = $count;
			return ;
		case 'check':
			$count = isset($session[$name]) ? $session[$name] : 0;
			return $count;
		case 'clear':
			if (isset($session[$name])) {
				unset($session[$name]);
			}
			return ;
		}
	}

	public function checkCaptcha()
	{
		$wrongTimes = $this->wrongTimes('check');
		if ($wrongTimes <= 5) {
			return ;
		}

        $validator = new \yii\captcha\CaptchaValidator();
        $valid =  $validator->validate($this->captcha);
        if (!$valid) {
            $this->addError('captcha', 'error captcha');
        }
	}

    protected function getUser()
    {
        if (is_null($this->_user)) {
            $this->_user = $this->getUserInfo(['mobile' => $this->mobile]);
        }
        return $this->_user;
    }
}