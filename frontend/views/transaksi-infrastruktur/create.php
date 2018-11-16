<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransaksiInfrastruktur */

$this->title = 'Create Transaksi Infrastruktur';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Infrastrukturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-infrastruktur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
