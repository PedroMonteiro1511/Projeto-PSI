<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'SaleOn';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">MenuAdmin!</h1>

        <p class="lead"></p>
    </div>

    <div class="body-content">

            <div class="card-deck">
                <div class="card">
                    <img src="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gestão de utilizadores</h5>
                        <p class="card-text">Gerir todos os utilizadores e adiconar novos.</p>
                        <p style="text-align:right"><?= Html::a('Ver utilizadores', ['user/index'], ['class' => 'btn btn-default']) ?></p>
                    </div>

                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gestão Vendas</h5>
                        <p class="card-text">É possivel gerir todos os artigos disponivel para vendas e adicionar novos.</p>
                        <p style="text-align:right"><?= Html::a('ver vendas', ['venda/index'], ['class' => 'btn btn-default']) ?></p>
                    </div>

                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gestão Leilões</h5>
                        <p class="card-text">Gerir todos os leiloes e adicionar novos</p>
                        <p style="text-align:right"><?= Html::a('ver leiloes', ['leilao/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
