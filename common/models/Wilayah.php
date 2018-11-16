<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id_wilayah
 * @property string $provinsi
 * @property string $kota
 * @property string $kecamatan
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provinsi', 'kota', 'kecamatan'], 'required'],
            [['provinsi', 'kota', 'kecamatan'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wilayah' => 'Id Wilayah',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'kecamatan' => 'Kecamatan',
        ];
    }
}
