<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Oferta */

$this->title = $model->montante;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="oferta-view">

    <h1><?= Html::encode($this->title) ?> €</h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idleilao',
            'iduser',
            'dataoferta',
            'montante',
        ],
    ]) ?>

</div>
