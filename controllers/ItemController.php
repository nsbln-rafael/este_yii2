<?php

namespace app\controllers;

use app\models\SearchForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class ItemController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new SearchForm();

        return $this->render('index', [
            'searchModel'  => $model,
        ]);
    }
}
