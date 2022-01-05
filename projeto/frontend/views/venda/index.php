<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
</style>

<div class="venda-index" >

    <h1><?= Html::encode($this->title) ?></h1>

    <section class="sections random-product">
        <div class="container-fluid">
            <div class="container">
                <div class="row">

                    <?php foreach ($vendas as $venda): ?>

                            <div class="col-md-4">
                                <div class="card" style="margin-bottom: 5px;">
                                    <img class="card-img-top" src="http://www.mihanmedia.ir/userfile/736708307-580x567.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $venda->titulo ?>
                                        </h5>
                                    </div>
                                    <div class="card-footer">
                                        <p> <?=Html::a('<b>Ver mais...</b>', ['view', 'id' => $venda->id], ['class' => 'badge badge float-right']); ?> </p>
                                        <div class="float-left">
                                            <a class="text-danger"><?= $venda->descricao ?></a>
                                            <br>
                                            <small class="text-muted">Preço: <b><?= $venda->preco ?> €</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.col-->

                    <?php endforeach; ?>


                </div><!--.row-->
            </div><!--.container-->
        </div><!--.container-fluid-->
    </section>
</div>

