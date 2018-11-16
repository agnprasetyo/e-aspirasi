<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%jenis}}".
 *
 * @property int $id
 * @property string $value
 * @property string $category
 *
 * @property TransaksiGangguanKeamanan[] $transaksiGangguanKeamanans
 * @property TransaksiInfrastruktur[] $transaksiInfrastrukturs
 * @property TransaksiPelayanan[] $transaksiPelayanans
 */
class Jenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'category'], 'required'],
            [['value', 'category'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiGangguanKeamanans()
    {
        return $this->hasMany(TransaksiGangguanKeamanan::className(), ['id_jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiInfrastrukturs()
    {
        return $this->hasMany(TransaksiInfrastruktur::className(), ['id_jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPelayanans()
    {
        return $this->hasMany(TransaksiPelayanan::className(), ['id_jenis' => 'id']);
    }
}
