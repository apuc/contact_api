<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\contacts\models\Contacts */

$this->title = 'Добавить контакт';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
