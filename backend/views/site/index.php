<?php

use dosamigos\highcharts\HighCharts;

/* @var $this yii\web\View */

$this->title = 'Aspirasi-el';
?>

<!-- <div class="col-md-8"> -->
<div class="site-index table-responsive">

    <?=
       Highcharts::widget([
          'clientOptions' => [
             'chart'=>[
                'type'=>'column'
             ],
             'title' => ['text' => 'Report Aspirasi Masyarakat'],
             'xAxis' => [
                'categories' => $categories,
             ],
             'yAxis' => [
                'title' => ['text' => 'Jumlah Aspirasi']
             ],
             'series' => $series
          ]
       ]);
    ?>
</div>
