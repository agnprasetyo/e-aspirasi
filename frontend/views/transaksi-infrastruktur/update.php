<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiInfrastruktur */

$this->title = 'Update Transaksi Infrastruktur: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Infrastrukturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-infrastruktur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
