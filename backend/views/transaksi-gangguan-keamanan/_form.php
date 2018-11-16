<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


\backend\assets\MapsAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\TransaksiGangguanKeamanan */
/* @var $form yii\widgets\ActiveForm */

$params['jenis'] = ArrayHelper::map(\common\models\Jenis::find()->where(['jenis.category' => 'kejahatan'])->all(), 'id', 'value');
$params['wilayah'] = ArrayHelper::map(\common\models\Wilayah::find()->all(), 'id', 'kota');

?>

<div class="transaksi-gangguan-keamanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis')->dropDownList($params['jenis'], ['prompt' => 'Pilih jenis kejahatan']) ?>

    <?= $form->field($model, 'id_wilayah')->dropDownList($params['wilayah'], ['prompt' => 'Pilih wilayah kejahatan']) ?>

    <div class="gllpLatlonPicker">

        <div class="panel panel-default">
          <div class="panel-body">
              <div class="gllpMap" style="min-width: 100%; height: 500px;">Google Maps</div>
          </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-4">
                <?php echo $form->field($model, 'longitude')->textInput(
                    [
                        'class' => 'form-control gllpLongitude',
                    ]
                ) ?>
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->field($model, 'latitude')->textInput(
                    [
                        'class' => 'form-control gllpLatitude',
                    ]
                ) ?>
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->field($model, 'zoom')->textInput(
                    [
                        'class' => 'form-control gllpZoom',
                    ]
                ) ?>
            </div>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
