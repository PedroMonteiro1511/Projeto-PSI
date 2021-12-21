<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'SaleOn';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">MenuAdmin!</h1>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Vendas</h2>

                <p></p>

                <p><?= Html::a('Gerir Vendas', ['venda/index'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Leilões</h2>

                <p></p>

                <p><?= Html::a('Gerir Leilõles', ['leilao//index'], ['class' => 'btn btn-success']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Utilizadores</h2>

                <p></p>

                <p><a class="btn btn-outline-secondary" href="http://localhost/projetoteste/backend/web/index.php?r=user%2Findex">Gerir</a></p>
            </div>
        </div>

    </div>
</div>
