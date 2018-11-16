<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%status_infrastruktur}}".
 *
 * @property int $id
 * @property string $value
 *
 * @property TransaksiInfrastruktur[] $transaksiInfrastrukturs
 */
class StatusInfrastruktur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%status_infrastruktur}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 21],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiInfrastrukturs()
    {
        return $this->hasMany(TransaksiInfrastruktur::className(), ['id_status' => 'id']);
    }
}
