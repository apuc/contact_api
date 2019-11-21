<?php

namespace backend\modules\source\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone
 *
 * @property Contacts[] $contacts
 */
class Source extends \common\models\Source
{
    public function init()
    {
        parent::init();
    }
}
