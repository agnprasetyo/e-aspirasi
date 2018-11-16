<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%review_pelayanan}}".
 *
 * @property int $id
 * @property string $value
 *
 * @property TransaksiPelayanan[] $transaksiPelayanans
 */
class ReviewPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%review_pelayanan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 20],
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
    public function getTransaksiPelayanans()
    {
        return $this->hasMany(TransaksiPelayanan::className(), ['id_review' => 'id']);
    }
}
