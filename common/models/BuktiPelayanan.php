<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bukti_pelayanan}}".
 *
 * @property int $id
 * @property int $id_pelayanan
 * @property string $judul_foto
 * @property string $file_foto
 * @property string $keterangan
 *
 * @property TransaksiPelayanan $transaksiPelayanan
 */
class BuktiPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bukti_pelayanan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelayanan', 'judul_foto', 'file_foto', 'keterangan'], 'required'],
            [['id_pelayanan'], 'integer'],
            [['keterangan'], 'string'],
            [['judul_foto'], 'string', 'max' => 20],
            [['file_foto'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pelayanan' => 'Id Pelayanan',
            'judul_foto' => 'Judul Foto',
            'file_foto' => 'File Foto',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPelayanan()
    {
        return $this->hasOne(TransaksiPelayanan::className(), ['id' => 'id_pelayanan']);
    }
}
