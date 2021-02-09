<?php

use app\models\SearchForm;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var View       $this */
/* @var SearchForm $model */
/* @var ActiveForm $form */

$tags = $model->getTags();
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['file'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tagsIncluded')->dropDownList($tags, ['multiple' => true]) ?>
    <?= $form->field($model, 'tagsExcluded')->dropDownList($tags, ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
