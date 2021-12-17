<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeilaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Leilões';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leilao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


   <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titulo',
            'descricao:ntext',
            'datalimite',
            'precobase',
            //'aprovado',

            ['class' => 'yii\grid\ActionColumn',
                'template' =>'{view}',
            ]
        ],
    ]); */  ?>


    <div class="container">
        <div class="row">

            <?php
            $data1 = new DateTime('now');
            foreach ($leiloes as $leilao){
            $data2 = new DateTime($leilao->datalimite);
                if ($data2 > $data1) {

                ?>
                    <div class="card-deck" style=" display: flex; flex: 1 1 auto; margin-left: 5px">
        <div class="card">
            <img  class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $leilao->titulo  ?> </h5>
                <p class="card-text"><?= $leilao->descricao  ?></p>
                <p class="card-text"><?= $leilao->precobase  ?> €</p>
                <p class="card-text"><small class="text-muted">Data Limite: <?= $leilao->datalimite  ?></small></p>
                <?=Html::a('Ver', ['leilao/view', 'id' => $leilao->id], ['class' => 'btn btn-primary']); ?>
            </div>
        </div>
        </div>
             <?php
                }

            }

            ?>

        </div>
    </div>

</div>


