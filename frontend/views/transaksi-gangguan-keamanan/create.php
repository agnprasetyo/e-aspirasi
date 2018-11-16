<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransaksiGangguanKeamanan */

$this->title = 'Create Transaksi Gangguan Keamanan';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Gangguan Keamanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-gangguan-keamanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
