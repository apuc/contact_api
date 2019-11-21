<?php

namespace backend\modules\contacts\models;

use backend\modules\source\models\Source;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $source_id
 *
 * @property Contacts $contacts
 */
class Contacts extends \common\models\Contacts
{
    public function init()
    {
        parent::init();
    }
}
