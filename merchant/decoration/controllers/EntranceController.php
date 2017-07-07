<?php
namespace merchant\decoration\controllers;

use Yii;
use merchant\decoration\models\Signin;
use merchant\decoration\models\Signup;
use merchant\components\Controller;
use baseapp\auth\controllers\EntranceTrait;

class EntranceController extends Controller
{
	use EntranceTrait;

    public function init()
    {
		parent::init();
		$this->layout = 'main-base';
    }

	public function getModel($sort)
	{
		switch ($sort) {
		case 'signin':
			return new Signin();
			break;
		case 'signup':
			return new Signup();
			break;
		}
	}

    protected function getHomeUrl()
    {
        $redirectUrl = Yii::$app->request->get('redirect_url', '/admin/');
        return $redirectUrl;
    }
}
