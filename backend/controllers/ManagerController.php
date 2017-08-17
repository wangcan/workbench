<?php

namespace backend\controllers;

use Yii;
use backend\models\Manager;
use backend\components\ControllerTraitFull;

class ManagerController extends Controller
{
    protected $modelClass = 'backend\models\Manager';
    protected $modelSearchClass = 'backend\models\searchs\Manager';
    use ControllerTraitFull;

    public function _addData()
    {
        return ['scenario' => 'create'];
    }


    protected function _getScenario()
    {
        return 'update';
    }

    public function actionEditInfo()
    {
        $model = Manager::findOne(Yii::$app->user->identity->id);
        $model->setScenario('edit-info');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'new infos was saved.'));
            }
            return $this->redirect('/');
        }

        return $this->render('@backend/views/common/change', [
            'model' => $model,
            'currentView' => $this->viewPrefix,
            'type' => 'edit-info',
        ]);
    }

    public function actionEditPassword()
    {
        $model = Manager::findOne(Yii::$app->user->identity->id);
        $model->setScenario('edit-password');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //$model->setPassword($model->password, 'password');
            $model->generateAuthKey();
            $model->status = 1;
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'New password was saved.'));
            }
            return $this->redirect(['/']);
        }

        return $this->render('@backend/views/common/change', [
            'model' => $model,
            'currentView' => $this->viewPrefix,
            'type' => 'edit-password',
        ]);
    }
}
