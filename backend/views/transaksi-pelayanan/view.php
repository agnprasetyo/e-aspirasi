<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPelayanan */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Aspirasi-el', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pelayanan-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_user',
                'value' => function ($model) {
                  return $model['user']->username;
                },
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tanggal',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_jenis',
                'value' => function ($model) {
                  return $model['jenis']->value;
                },
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_wilayah',
                'value' => function ($model) {
                  return $model['wilayah']->kota;
                },
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_review',
                'value' => function ($model) {
                  return $model['review']->value;
                },
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_tempat',
                'value' => function ($model) {
                  return $model['tempat']->value;
                },
            ],
        ],
    ]) ?>

</div>
