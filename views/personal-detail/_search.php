<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalDetailtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'p_name') ?>

    <?= $form->field($model, 'p_nick_name') ?>

    <?= $form->field($model, 'p_DOB') ?>

    <?= $form->field($model, 'p_fname') ?>

    <?php // echo $form->field($model, 'p_pic') ?>

    <?php // echo $form->field($model, 'p_gender') ?>

    <?php // echo $form->field($model, 'p_Skill') ?>

    <div class="form-group">

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
