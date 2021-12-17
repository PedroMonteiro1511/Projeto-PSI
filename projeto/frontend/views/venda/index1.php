<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="container">
<div class="row">


    <?php foreach ($vendas as $venda): ?>
        <div class="card-deck" style="width: 100%">
            <div class="card" >
                <img class="card-img-top"><?= $venda->imagem ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $venda->titulo ?></h5>
                    <p class="card-text"><?= $venda->descricao ?></p>
                    <p class="card-text" style="text-align: right"><?= $venda->preco ?>€</p>
                    <?= Html::a('Ver', ['user', 'id' => $venda->id], ['class' => 'btn btn-primary'])?>
                    <div class="btFavorito" style="float: right;"  <?= Html::a('⭐', ['user', 'id' => $venda->id], ['class' => 'btn btn-default'])?></div>
                </div>
                </div>
</div>




        <?php endforeach;?>


</div>
</div>




