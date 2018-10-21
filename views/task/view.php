<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\TaskUser;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $searchModel app\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'creator_id',
            'updater_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'username',
                'value' => function(\app\models\TaskUser $model) {
                    $user = TaskUser::findOne($model->user_id);
                    return User::findOne($user)->username;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, \app\models\TaskUser $model, $key) {
                        $ico = \yii\bootstrap\Html::icon('ban-circle');
                        return Html::a($ico,
                            ['task-user/delete', 'id' => $model->id], [
                                'data' => [
                                    'confirm' => 'Удалить доступ?',
                                    'method' => 'post',
                                ],
                            ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
