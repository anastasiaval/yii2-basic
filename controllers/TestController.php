<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class TestController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Product();
        $model->name = 'Phone';
        $model->id = 123;
        $model->price = 1000;
        $model->category = 'Electronics';

        //return $this->renderContent('Hello');

        return $this->render('index', [

            //'var' => 'test'

            'model' => $model
        ]);
    }
}

