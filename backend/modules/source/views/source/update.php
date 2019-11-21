<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\source\models\Source */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирвать';
?>
<div class="source-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
