<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPelayanan */

$this->title = 'Create Transaksi Pelayanan';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-pelayanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
