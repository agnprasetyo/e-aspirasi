<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\controllers\TransaksiGangguanKeamananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Gangguan Keamanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-gangguan-keamanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transaksi Gangguan Keamanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'tanggal',
            'id_jenis',
            'id_wilayah',
            //'longitude',
            //'latitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
