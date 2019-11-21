<?php

/* @var $this yii\web\View */

$this->title = 'Contacts API';

use yii\helpers\Html; ?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <h3>Инструкция по использованию:</h3>
                <p class="lead">Развертывание и настройка Yii </p>
                <p>
                    Клонировать проект из репозитория. <br>
                    В консоли зайти в корень проекта, и выполнить следующие команды: <br>
                    1. composer install <br>
                    2. php init <br>
                    3. yii migrate <br>
                </p>
                <p class="lead">Установите расширение для браузера RestMan.</p>
                <p class="lead">Поиск данных</p>
                Зайдите в  раширение RestMan. Выберете из выпадающего списка метод передачи данных "GET". <br>
                Вставте в строку поиска запрос вида: <br> https://contact-api.craft-group.xyz/contacts?ContactsSearch[name]=Иван <br>
                Нажмите на <?= Html::img('/uploads/arrow.png', ['width' => '30',]) ?> для выполнения запроса.<br>
                Запрос из премера вернет записи из базы в которых name = Иван. <br>
                Можно осуществлять поиск по name, email и phone. <br>
                В блоке response на вкладке body появится ответ. <br><br>
                <?= Html::img('/uploads/get.png', ['width' => '550',]) ?>
            </div>
            <div class="col-lg-6">
                <p class="lead">Запись данных</p>
                Зайдите в  раширение RestMan. Выберете из выпадающего списка метод передачи данных "POST". <br>
                Вставте в строку поиска запрос: <br> https://contact-api.craft-group.xyz/contacts/create <br>
                В блоке response на вкладке raw вставте данные в формате JSON. <br>
                Пример данных: <br>
                <pre>
                    {
                    "source_id": 1,
                    "items": [
                    {
                        "name": "Анна",
                        "email": "mail1@gmail.com",
                        "phone": 9001234457
                    },
                    {
                        "name": "Иван",
                        "email": "mail2@gmail.com",
                        "phone": "+79001234823"
                    }]
                    }
                </pre>
                Нажмите на <?= Html::img('/uploads/arrow.png', ['width' => '30',]) ?> для выполнения запроса.<br>
                В блоке response на вкладке body появится результат - количество записей добаленных в базу данных. <br>
                <?= Html::img('/uploads/post.png', ['width' => '550',]) ?>
                <?= Html::img('/uploads/response_post.png', ['width' => '200',]) ?>
                <p></p>
            </div>
        </div>
    </div>
</div>
