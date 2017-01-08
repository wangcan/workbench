<?php

namespace backend\gallerycms\controllers\eale;

use backend\components\AdminController;
use backend\components\ControllerFullTrait;

class GuestbookController extends AdminController
{
    use ControllerFullTrait;
	protected $modelClass = 'gallerycms\eale\models\Guestbook';
    protected $modelSearchClass = 'gallerycms\eale\models\searchs\Guestbook';

}