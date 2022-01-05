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

    <h1 align="center">Detalhes do Utilizador</h1>

    <h1 align="center"><?= Html::encode($model->username) ?></h1>


    <style>
        input, label {
            display:block;
            width: 100%;
        }
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>

</div>

<script type="text/javascript">
    function copytext() {
        var copyText = "<?php echo $model->email; ?>";
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }
</script>

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button> <span class="name mt-3"> Nome : <?= $model->username ?></span> <span class="idd"></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1"> Email para contacto : <?= $model->email ?></span> <span><i class="fa fa-copy"></i></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number"> <span class="follow"></span></span> </div>
            <div class=" d-flex mt-2"></div>
            <div class=" px-2 rounded mt-4 date "> <span class="join">Utilizador Registado desde:  <?= $model->created_at ?></span> </div>
        </div>
    </div>
</div>
