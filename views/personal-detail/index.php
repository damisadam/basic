<?php


use yii\grid\GridView;
use app\models\PersonalDetail;
use kartik\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalDetailtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Details';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="personal-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <?php echo Html::panel(
     ['heading' => 'Panel Heading', 'body' => 'Panel Content'],
     Html::TYPE_INFO
 ); ?>

    <p>
        <?= Html::a('Create Personal Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'p_id',
            'p_name',
           // 'p_nick_name',
            'p_fname',
            'p_DOB',
         /*   array(
                'format' => 'image',
                'attribute'=>'p_pic',
                'value'=>function($data) { $model = new PersonalDetail(); return $model->getImageurl($data); },
            ),*/
            // 'p_gender',
            // 'p_Skill',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
