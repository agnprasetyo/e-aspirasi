<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiPelayanan */
/* @var $form yii\widgets\ActiveForm */

$params['jenis'] = ArrayHelper::map(\common\models\Jenis::find()->where(['category' => 'pelayanan'])->all(), 'id', 'value');
$params['wilayah'] = ArrayHelper::map(\common\models\Wilayah::find()->all(), 'id', 'kota');
$params['review'] = ArrayHelper::map(\common\models\ReviewPelayanan::find()->all(), 'id', 'value');
$params['tempat'] = ArrayHelper::map(\common\models\TempatPelayanan::find()->all(), 'id', 'value');
?>

<div class="transaksi-pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis')->dropDownList($params['jenis'], ['prompt' => 'Pilih jenis pelayanan']) ?>

    <?= $form->field($model, 'id_wilayah')->dropDownList($params['wilayah'], ['prompt' => 'Pilih wilayah pelayanan']) ?>

    <?= $form->field($model, 'id_review')->dropDownList($params['review'], ['prompt' => 'Pilih review pelayanan']) ?>

    <?= $form->field($model, 'id_tempat')->dropDownList($params['tempat'], ['prompt' => 'Pilih tempat pelayanan']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
