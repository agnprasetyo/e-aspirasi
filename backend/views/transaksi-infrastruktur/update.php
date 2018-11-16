<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiInfrastruktur */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Infrastrukturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-infrastruktur-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
