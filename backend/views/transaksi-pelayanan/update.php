<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPelayanan */

$this->title = 'Update Laporan Pelayanan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-pelayanan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
