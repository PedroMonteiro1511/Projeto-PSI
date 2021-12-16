<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1 align="center"> Utilizador: <?= Html::encode($model->username) ?></h1>

    </p>

    <style>
        input, label {
            display:block;
            width: 100%;
        }
    </style>



    <div style="float:left; margin-right:20px;">


        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['readonly'=>!$model->isNewRecord,'maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['size'=>'100%','readonly'=>!$model->isNewRecord,'maxlength' => true,'id'=>'email']) ?>


            <button class="btn btn-primary" onclick="copytext()">
                <?php

                echo Html::tag('span','Copiar Email ✉',[
                    'title'=>'Email Copiado',
                    'data-toggle'=>'popover',
                    'data-content'=>'O email foi copiado para a sua clipboard' ,
                    'style'=> 'cursor:pointer;',
                    'id' => 'email'
                ]);

                ?>
            </button>


        <?= \yii\helpers\Html::a( 'Back', Yii::$app->request->referrer, ['class'=>'btn btn-outline-secondary']); ?>

        <script type="text/javascript">
            function copytext() {
                var copyText = document.getElementById("email");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);
            }
        </script>

        <?php ActiveForm::end(); ?>


    </div>



</div>
