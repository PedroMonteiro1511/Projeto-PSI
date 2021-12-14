<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title =  $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    if ( Yii::$app->getUser()->id != $model->id){ ?>
        <?=
        $this->render('error', [
            'model' => $model,
        ]);

        ?>
        <?php
    }
    else { ?>
        <?=   $this->render('_form', [
            'model' => $model,
        ]) ?>

        <?php
    }
    ?>

</div>
