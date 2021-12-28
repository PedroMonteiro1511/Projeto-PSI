<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeilaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Leilões';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leilao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <style>
        span.separator {
            border-top: 1px solid #333;
            width: 100%;
            height: 1px;
            display: block;
        }

        hr{
            border: 1px solid grey;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid grey;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: lightgrey;
        }
    </style>

    <table>
        <tr>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Preço Base</th>
            <th>Aprovado</th>
            <th>Aprovar Leilao</th>
        </tr>
        <?php foreach ($leiloes as $l): ?>
            <?php
            $datahoje = new DateTime('now');
            $datalimite = new DateTime($l->datalimite);

            if ($datalimite > $datahoje){

                ?>
                <tr>
                <td> <?= $l->titulo ?> </td>
                <td> <?= $l->descricao ?> </td>
                <td>  <?= $l->precobase ?> </td>
                <td> <?= $l->aprovado ?> </td>
                <?php
                if ($l->aprovado == 'N'){
                    ?>
                    <td> <?= Html::a('Aprovar Leilão', ['updateaprovado', 'id' => $l->id], ['class' => 'btn btn-primary'])?></td>
                    <?php
                }
                elseif ($l->aprovado == 'S'){
                    ?>
                    <td> <?= Html::a('Remover Leilão', ['updateaprovado', 'id' => $l->id], ['class' => 'btn btn-danger'])?></td>
                    <?php
                }
            }
            ?>
            </tr>

        <?php endforeach; ?>
    </table>
</div>
