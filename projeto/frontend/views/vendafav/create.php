<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vendafav */

$this->title = 'Create Vendafav';
$this->params['breadcrumbs'][] = ['label' => 'Vendafavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendafav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
