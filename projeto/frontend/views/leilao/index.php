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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="leilao-index" >

    <h1><?= Html::encode($this->title) ?></h1>


    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>


    <section class="sections random-product">
        <div class="container-fluid">
            <div class="container">
                <div class="row">

    <?php foreach ($leiloes as $leilao): ?>

    <?php
    $datahoje = new DateTime('now');
    $datalimite = new DateTime($leilao->datalimite);
    $aprovado = $leilao->aprovado;

    if (($datalimite > $datahoje) && ($leilao->aprovado == 'S')){



    ?>

        <div class="col-md-4">
            <div class="card" style="margin-bottom: 5px;">
                <img class="card-img-top" src="<?= $leilao->imagem ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $leilao->titulo ?>
                    </h5>
                </div>
                <div class="card-footer">
                    <p> <?=Html::a('Ver mais...', ['view', 'id' => $leilao->id], ['class' => 'badge badge float-right','name'=>'btn-ver']); ?> </p>
                    <div class="float-left">
                        <a class="text-danger"><?= $leilao->descricao ?></a>
                        <br>
                        <small class="text-muted">Preço Base: <b><?= $leilao->precobase ?> €</b></small>
                    </div>
                    <div class="float-right">
                        <br>
                        <small class="text-muted">Fim:<?= $leilao->datalimite ?> </small>
                    </div>
                </div>
            </div>
        </div><!--.col-->

        <?php
        }

        ?>

    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </section>


</div>




