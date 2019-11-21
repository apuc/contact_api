<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\source\models\Source */

$this->title = 'Добавить источник';
$this->params['breadcrumbs'][] = ['label' => 'Источники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
