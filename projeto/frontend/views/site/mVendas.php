<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeilaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minhas Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a('Adicionar um leilão', ['create'], ['class' => 'btn btn-success']) ?>

    <?= Html::a('Adicionar uma Venda', ['create'], ['class' => 'btn btn-success']) ?>
</p>


