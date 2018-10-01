<?php

namespace app\controllers;

use app\components\TestService;
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
        //$test = new TestService();
        //$test->run();
        return \Yii::$app->test->run();

        $model = new Product(['name' => 'Phone', 'id' => 123, 'price' => 1000, 'category' => 'Electronics']);
        //$model->name = 'Phone';
        //$model->id = 123;
        //$model->price = 1000;
        //$model->category = 'Electronics';

        return $this->render('index', [

            'model' => $model
        ]);
    }
}

