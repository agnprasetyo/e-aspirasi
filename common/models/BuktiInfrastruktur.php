<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bukti_infrastruktur}}".
 *
 * @property int $id
 * @property int $id_infrastruktur
 * @property string $judul_foto
 * @property string $file_foto
 * @property string $keterangan
 *
 * @property TransaksiInfrastruktur $infrastruktur
 */
class BuktiInfrastruktur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bukti_infrastruktur}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_infrastruktur', 'judul_foto', 'file_foto', 'keterangan'], 'required'],
            [['id_infrastruktur'], 'integer'],
            [['keterangan'], 'string'],
            [['judul_foto'], 'string', 'max' => 20],
            [['file_foto'], 'string', 'max' => 11],
            [['id_infrastruktur'], 'exist', 'skipOnError' => true, 'targetClass' => TransaksiInfrastruktur::className(), 'targetAttribute' => ['id_infrastruktur' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_infrastruktur' => 'Id Infrastruktur',
            'judul_foto' => 'Judul Foto',
            'file_foto' => 'File Foto',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastruktur()
    {
        return $this->hasOne(TransaksiInfrastruktur::className(), ['id' => 'id_infrastruktur']);
    }
}
