<?php

namespace app\controllers;

use app\components\TestService;
use app\models\Product;
use yii\db\Query;
use yii\helpers\VarDumper;
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
        //$this->actionInsert();
        return $this->actionSelect();
    }

    public function actionInsert()
    {
        \Yii::$app->db->createCommand()
            ->batchInsert('user', ['id', 'username', 'name', 'password_hash', 'access_token', 'auth_key',
                'creator_id', 'updater_id', 'created_at', 'updated_at'], [
                ['', 'Ann78', 'Anna', '121354648', '', '', 1, '', 15000000, ''],
                ['', 'Ruby', 'Rebecca', '8484515165', '', '', 2, '', 15000000, ''],
                ['', 'Star1999', 'Star', 'wefgerfwef', '', '', 3, '', 15000000, ''],
            ])->execute();

        \Yii::$app->db->createCommand()
            ->batchInsert('task',
                ['id', 'title', 'description', 'creator_id', 'updater_id', 'created_at', 'updated_at'], [
                ['', 'First', 'task 1', 1, '', 15000000, ''],
                ['', 'Second', 'task 2', 2, '', 15000000, ''],
                ['', 'Third', 'task 3', 3, '', 15000000, '']
            ])->execute();
    }

    public function actionSelect()
    {
        //Запись с id=1
        $id = 1;
        //$query = (new Query())->from('user')->where(['id' => $id]);
        //$result = $query->all();
        //return VarDumper::dumpAsString($result, 5, true);

        //Все записи с id>1 отсортированные по имени (orderBy())
        //$query = (new Query())->from('user')->where(['>', 'id', $id])->orderBy('name');
        //$result = $query->all();
        //return VarDumper::dumpAsString($result, 5, true);

        //количество записей
        //$query = (new Query())->from('user');
        //$result = $query->count();
        //return VarDumper::dumpAsString($result, 5, true);

        //Используя \yii\db\Query в экшене select TestController-а вывести содержимое task
        // с присоединенными по полю creator_id записями из таблицы user (innerJoin())'post.user_id = user.id'
        $query = (new Query())->from('task')
            ->innerJoin('user', 'user.id = task.creator_id');
        $result = $query->all();
        return VarDumper::dumpAsString($result, 5, true);

    }
}

