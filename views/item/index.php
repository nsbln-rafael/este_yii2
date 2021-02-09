<?php

use app\models\SearchForm;
use yii\helpers\Html;
use yii\web\View;

/* @var View               $this         */
/* @var SearchForm         $searchModel  */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', ['model' => $searchModel]); ?>
</div>
