<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PersonalDetail;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalDetail */

$this->title = $model->p_id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->p_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->p_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php echo DetailView::$counter ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'p_id',
            'p_name',
            'p_nick_name',
            'p_DOB',
            'p_fname',
            'p_gender',
           // 'p_Skill',
            'p_email',
        ],
    ]) ?>

</div>
