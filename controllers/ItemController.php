<?php

namespace app\controllers;

use app\models\SearchForm;
use app\services\FileManagerInterface;
use Yii;
use yii\web\Controller;

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

    public function actionFile(FileManagerInterface $manager)
    {
        $model = new SearchForm();
        $items = $model->search(Yii::$app->request->getQueryParams());

        $filename = $manager->getCSV($items);
        $filePath = 'files/' . $filename;

        return Yii::$app->response->sendFile($filePath);
    }
}
