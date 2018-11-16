<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiInfrastruktur */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Aspirasi-el', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-infrastruktur-view">
  
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
                'attribute'=>'longitude',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'latitude',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'zoom',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'id_status',
                'value' => function ($model) {
                  return $model['status']->value;
                },
            ],
          ],
    ]) ?>

</div>
