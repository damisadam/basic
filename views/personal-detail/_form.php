<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

use app\models\PersonalDetail;
$models = new PersonalDetail();

/* @var $this yii\web\View */
/* @var $model app\models\PersonalDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-detail-form">
<div class="col-lg-12 btn-group-lg">
    <?php  $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?=  $form->field($model, 'p_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'p_nick_name')->textInput(['maxlength' => 255]) ?>

    <?=$form->field($model, 'p_DOB')->textInput(['maxlength' => 255]) ?>
    <?php //echo '<label>Check Issue Date</label>';
   /* echo DatePicker::widget([
        'name' => 'p_DOB',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true
        ]
    ]); */ ?>

    <?= $form->field($model, 'p_fname')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'p_email')->Input('email') ?>


    <?=$form->field($model, 'p_gender')->radioList(['Male' => 'Male', 'Female' => 'Female'], ['itemOptions' => ['class' =>'radio-inline']])?>
    <?php //$form->field($model,'p_Skill')->checkboxList(['WP' => 'WP', 'HTML' => 'HTML'], ['itemOptions' => ['class' =>'radio-inline btn-group-lg']]) ?>

    <?php //$form->field($model, 'p_pic')->fileInput(); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
