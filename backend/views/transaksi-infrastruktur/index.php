<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransaksiInfrastrukturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Infrastruktur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-infrastruktur-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Laporan Infrastruktur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require '_columns.php',
    ]); ?>
</div>
