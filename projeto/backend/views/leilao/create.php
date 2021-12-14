<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leilao */

$this->title = 'Create Leilao';
$this->params['breadcrumbs'][] = ['label' => 'Leilaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leilao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
