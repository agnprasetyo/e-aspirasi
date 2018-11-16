<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%transaksi_pelayanan}}".
 *
 * @property int $id
 * @property int $id_user
 * @property string $tanggal
 * @property int $id_jenis
 * @property int $id_wilayah
 * @property int $id_review
 * @property int $id_tempat
 * @property int $approve
 *
 * @property BuktiPelayanan[] $buktiPelayanans
 * @property User $user
 * @property Jenis $jenis
 * @property Wilayah $wilayah
 * @property TempatPelayanan $tempat
 * @property ReviewPelayanan $review
 */
class TransaksiPelayanan extends \yii\db\ActiveRecord
{
    const STATUS_NOT_APPROVED = 0;
    const STATUS_APPROVED     = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaksi_pelayanan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_wilayah', 'id_review', 'id_tempat'], 'required'],
            [['id_jenis', 'id_wilayah', 'id_review', 'id_tempat', 'approve'], 'integer'],
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id_jenis' => 'id']],
            [['id_wilayah'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::className(), 'targetAttribute' => ['id_wilayah' => 'id']],
            [['id_tempat'], 'exist', 'skipOnError' => true, 'targetClass' => TempatPelayanan::className(), 'targetAttribute' => ['id_tempat' => 'id']],
            [['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewPelayanan::className(), 'targetAttribute' => ['id_review' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Username',
            'tanggal' => 'Tanggal Input',
            'id_jenis' => 'Jenis Pelayanan',
            'id_wilayah' => 'Wilayah',
            'id_review' => 'Review Pelayanan',
            'id_tempat' => 'Tempat Pelayanan',
            'approve' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuktiPelayanans()
    {
        return $this->hasMany(BuktiPelayanan::className(), ['id_pelayanan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::className(), ['id' => 'id_wilayah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempat()
    {
        return $this->hasOne(TempatPelayanan::className(), ['id' => 'id_tempat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(ReviewPelayanan::className(), ['id' => 'id_review']);
    }
}
