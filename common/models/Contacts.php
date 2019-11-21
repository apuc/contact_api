<?php

namespace common\models;

use common\classes\Debug;
use common\classes\PhoneHelper;
use common\models\Source;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string created_at
 * @property int $source_id
 *
 * @property Contacts $contacts
 */
class Contacts extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
                'createdAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'source_id'], 'required'],
            [['source_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [
                ['source_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Source::className(),
                'targetAttribute' => ['source_id' => 'id']
            ],
            [['phone'], 'uniqueByDate'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'created_at' => 'Дата добавления',
            'source_id' => 'ID источника',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->formatPhone();
            return true;
        }
        return false;
    }

    public function formatPhone()
    {
        $formats = array(
            '10' => '##########',
            '11' => '###########'
        );

        $p = PhoneHelper::format($this->phone, $formats, '#');
        if (strlen($p) > 10) {
            $p = substr($p, 1);
        }
        $this->phone = $p;
    }

    public function uniqueByDate($name, $params)
    {
        $this->formatPhone();
        $res = Contacts::find()
            ->where("created_at >= CURDATE()")
            ->andWhere(['phone' => $this->phone])
            ->count();

        if ($res > 0) {
            $this->addError($name, "Сегодня такой номер уже был добавлен!");
            return false;
        }
        return true;
    }
}
