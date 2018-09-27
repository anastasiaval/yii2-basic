<?php
/**
 * @var \app\models\Product $model
 */
?>
<h1><?= $model->name ?></h1>
<p><?= $model->price ?></p>
<p><?= $model->category ?></p>
<p><?= $model->id ?></p>

<?= \yii\widgets\DetailView::widget(['model' => $model]) ?>
<?php

