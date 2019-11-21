<?php

namespace frontend\modules\contacts\controllers;

use common\classes\Debug;
use common\models\Contacts;
use common\models\Source;
use frontend\modules\contacts\models\ContactsSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `contacts` module
 */
class ContactsController extends ActiveController
{
    public function actions()
    {

        $actions = parent::actions();

        unset($actions['create']);

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {

        $searchModel = new \common\models\ContactsSearch();
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public $modelClass = 'common\models\Contacts';


    public function actionCreate()
    {
        $arr = json_decode(Yii::$app->request->getRawBody());
        $i = 0;
        $source = Source::find()->where(['id' => $arr->source_id])->all();
        if ($source) {

            foreach ($arr->items as $item) {
                $contact = new Contacts();
                $contact->name = $item->name;
                $contact->email = $item->email;
                $contact->phone = $item->phone;
                $contact->source_id = $arr->source_id;

                if ($contact->save())
                    $i++;
            }
        }
        return ['count' => $i];
    }

    public function Show()
    {
        $params = Yii::$app->request->get();
//        Debug::dd($params);
        $contactSearch = new ContactsSearch();
        $contactSearch->search($params);
    }
}
