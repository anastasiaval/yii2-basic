<?php

namespace app\controllers;

use app\models\User;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * Displays page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->actionTest();
        return $this->render('index');
    }

    public function actionTest()
    {
        //$model = new User();
        //$model->username = 'First';
        //$model->name = 'First';
        //$model->password_hash = 'fuherifei';
        //$model->created_at = time();
        //$model->creator_id = 1;
        //$model->save();

        //User::find()->with(User::RELATION_TASKS_CREATED)->all();

        User::find()->joinWith(User::RELATION_TASKS_CREATED)->all();
    }
}

