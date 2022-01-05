<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Leilao */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
</style>

  <div class="leilao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['placeholder' => Yii::t('app', 'Titulo') ])->label('Titulo') ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6,'placeholder' => Yii::t('app', 'Descrição') ])->label('Descrição') ?>


    <?= $form->field($model, 'datalimite')->widget(DateTimePicker::className(), [
        'language' => 'pt',
        'size' => 'ms',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => true,
        'clientOptions' => [
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd HH:ii:ss P',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'precobase')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>












