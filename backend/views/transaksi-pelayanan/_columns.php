<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_user',
        'value' => 'user.username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_jenis',
        'value' => 'jenis.value',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_wilayah',
        'value' => 'wilayah.kota',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_review',
        'value' => 'review.value',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_tempat',
        'value' => 'tempat.value',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute'=>'approve',
        'value' => function ($model) {
          return $model->approve == $model::STATUS_NOT_APPROVED ? Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-success btn-xs', 'data-method' => 'post']) : Html::a('Batal Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs', 'data-method' => 'post']);
        },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
    //     'dropdown' => false,
    //     'vAlign'=>'middle',
    //     'urlCreator' => function($action, $model, $key, $index) {
    //             return Url::to([$action,'id'=>$key]);
    //     },
    //     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    //     'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
    //     'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
    //                       'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
    //                       'data-request-method'=>'post',
    //                       'data-toggle'=>'tooltip',
    //                       'data-confirm-title'=>'Are you sure?',
    //                       'data-confirm-message'=>'Are you sure want to delete this item'],
    ],

];
