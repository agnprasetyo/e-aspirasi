<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransaksiGangguanKeamanan */

$this->title = 'Buat Laporan Gangguan Keamanan';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Gangguan Keamanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-gangguan-keamanan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
