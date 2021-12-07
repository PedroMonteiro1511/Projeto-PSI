<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeilaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meus Leilões';
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a('Adicionar um leilão', ['create'], ['class' => 'btn btn-success']) ?>
</p>




<h1 align="center">Meus Leilões</h1>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'titulo',
        'descricao:ntext',
        'datalimite',
        'precobase',
        'aprovado',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);  ?>


