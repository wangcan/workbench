<?php

namespace backend\merchant\controllers;

use common\helpers\Tree;
use backend\components\AdminController;
use backend\components\ControllerTraitFull;

class MenuController extends AdminController
{
    protected $modelClass = 'merchant\models\Menu';
    use ControllerTraitFull;

    public $viewPrefix = '//menu/';

    public function behaviors()
    {
        return [];
    }

    public function actionListinfo()
    {
        $modelClass = $this->modelClass;
        return $this->_listinfoTree(new $modelClass());
    }
}
