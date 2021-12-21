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


    <?php foreach ($leiloes as $leilao): ?>

    <?php
    $datahoje = new DateTime('now');
    $datalimite = new DateTime($leilao->datalimite);

    if ($datalimite > $datahoje){



    ?>

    <div class="card-deck">
        <div class="card" style="width: 100%; background-color: #D3D3D3; margin-top: 5px ">
            <img class="card-img-top" src="">
            <div class="card-body">
                <h5 class="card-title"><?= $leilao->titulo ?> </h5>
                <p class="card-text"><?= $leilao->descricao ?></p>
                <p class="card-text"><small><?= $leilao->datalimite ?></small></p>
                <p> <?=Html::a('Ver mais...', ['view', 'id' => $leilao->id], ['class' => 'btn btn-primary']); ?> </p>
            </div>
        </div>
    </div>

        <?php
        }

        ?>

    <?php endforeach; ?>


</div>
