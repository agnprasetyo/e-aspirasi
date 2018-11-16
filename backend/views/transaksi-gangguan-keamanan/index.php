<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransaksiGangguanKeamananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Gangguan Keamanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-gangguan-keamanan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Laporan Gangguan Keamanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require '_columns.php',
        //     ['class' => 'yii\grid\SerialColumn'],
        //
        //     'id',
        //     'id_user',
        //     'tanggal',
        //     'id_jenis',
        //     'id_wilayah',
        //     'longitude',
        //     'latitude',
        //     'zoom',
        //     'approve',
        //
        //     ['class' => 'yii\grid\ActionColumn'],
        // ],
    ]); ?>
</div>
