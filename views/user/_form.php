<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PersonalDetail;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">


    <?php $form = ActiveForm::begin(); ?>
    <?php
    $dataCategory=ArrayHelper::map(PersonalDetail::find()->all(), 'p_id', 'p_name');
    echo $form->field($model, 'id')->dropDownList($dataCategory,
        ['prompt'=>'-Choose a Category-',
            'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('user/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#title" ).html( data );
                });
            ']);

    $dataPost=ArrayHelper::map(Product::find()->asArray()->all(), 'p_id', 'p_name');
    echo $form->field($model, 'username')
        ->dropDownList(
            $dataPost,

            ['id'=>'title','prompt'=>'-selelct a product-']

        ); ?>
    <?php // echo $form->field($model, 'id')->dropDownList(ArrayHelper::map(PersonalDetail::find()->all(), 'p_id', 'p_name'))  ?>

    <?php // echo  $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
