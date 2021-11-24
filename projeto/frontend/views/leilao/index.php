<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeilaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leilões';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leilao-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>



  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'titulo',
            'descricao:ntext',
            'datalimite',
            'precobase',
            //'aprovado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?>


</div>
