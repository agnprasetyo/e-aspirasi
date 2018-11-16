<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bukti_kejahatan}}".
 *
 * @property int $id
 * @property int $id_gangguan_keamanan
 * @property string $judul_foto
 * @property string $file_foto
 * @property string $keterangan
 *
 * @property TransaksiGangguanKeamanan $gangguanKeamanan
 */
class BuktiKejahatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bukti_kejahatan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gangguan_keamanan', 'judul_foto', 'file_foto', 'keterangan'], 'required'],
            [['id_gangguan_keamanan'], 'integer'],
            [['keterangan'], 'string'],
            [['judul_foto', 'file_foto'], 'string', 'max' => 20],
            [['id_gangguan_keamanan'], 'exist', 'skipOnError' => true, 'targetClass' => TransaksiGangguanKeamanan::className(), 'targetAttribute' => ['id_gangguan_keamanan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gangguan_keamanan' => 'Id Gangguan Keamanan',
            'judul_foto' => 'Judul Foto',
            'file_foto' => 'File Foto',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGangguanKeamanan()
    {
        return $this->hasOne(TransaksiGangguanKeamanan::className(), ['id' => 'id_gangguan_keamanan']);
    }
}
