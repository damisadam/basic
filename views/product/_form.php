<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PersonalDetail;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$models = new PersonalDetail();
$catList=$models->getPerson();
/*foreach($catList as $person=>$test )
{
    $list[]=$person;
}*/
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'pro_id')->dropDownList(ArrayHelper::map(PersonalDetail::find()->all(), 'p_id', 'p_name'))  ?>
    <?php // echo $form->field($model, 'pro_id')->dropDownList($catList, ['pro_id'=>'p_id']); ?>

    <?= $form->field($model, 'p_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'p_price')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'p_sku')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'p_quantity')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
