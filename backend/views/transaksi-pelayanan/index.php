<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransaksiPelayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pelayanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pelayanan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Aspirasi Pelayanan', ['create'], ['class' => 'btn btn-success']) ?>
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
        //     'id_review',
        //     'id_tempat',
        //     'approve',
        //
        //     ['class' => 'yii\grid\ActionColumn'],
        // ],
    ]); ?>
</div>
