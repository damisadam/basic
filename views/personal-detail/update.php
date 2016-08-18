<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalDetail */

$this->title = 'Update Personal Detail: ' . ' ' . $model->p_id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p_id, 'url' => ['view', 'id' => $model->p_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
