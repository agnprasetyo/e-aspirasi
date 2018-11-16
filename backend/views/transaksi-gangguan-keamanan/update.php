<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiGangguanKeamanan */

$this->title = 'Update Laporan Gangguan Keamanan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Gangguan Keamanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-gangguan-keamanan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
