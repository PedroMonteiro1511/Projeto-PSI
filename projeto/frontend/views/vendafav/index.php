<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendafavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas Favoritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendafav-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vendafav', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'iduser',
            'idvenda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
