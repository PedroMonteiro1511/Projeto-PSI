<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'SALES ON';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bem-vindo!</h1>

        <p class="lead">Começa agora a vendar e comprar o que precisas.</p>

    </div>

    <div class="body-content">

        <div class="row">

            <div align="center" class="col-lg-offset-4">
                <h2>Artigos</h2>

                <p>Começa a explorar todos os artigos disponiveis no site.</p>

                <p><?= Html::a('Ver Vendas', ['venda/index'], ['class' => 'btn btn-outline-secondary']) ?></p>
            </div>

            <div class="col-lg-3">



            </div>

            <div align="center" class="col-lg-offset-4">
                <h2>Leilões</h2>

                <p>Começa já a participar em leilões de diversos artigos.</p>

                <p><?= Html::a('Ver Leilões', ['leilao/index'], ['class' => 'btn btn-outline-secondary']) ?></p>

            </div>
        </div>

    </div>
</div>
