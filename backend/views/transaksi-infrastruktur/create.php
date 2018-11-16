<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransaksiInfrastruktur */

$this->title = 'Buat Laporan Infrastruktur';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Infrastrukturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-infrastruktur-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
