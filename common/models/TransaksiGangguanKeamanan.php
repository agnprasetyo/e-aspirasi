<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%transaksi_gangguan_keamanan}}".
 *
 * @property int $id
 * @property int $id_user
 * @property string $tanggal
 * @property int $id_jenis
 * @property int $id_wilayah
 * @property string $longitude
 * @property string $latitude
 * @property int $zoom
 * @property int $approve
 *
 * @property BuktiKejahatan[] $buktiKejahatans
 * @property User $user
 * @property Jenis $jenis
 * @property Wilayah $wilayah
 */
class TransaksiGangguanKeamanan extends \yii\db\ActiveRecord
{
    const STATUS_NOT_APPROVED = 0;
    const STATUS_APPROVED     = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaksi_gangguan_keamanan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_wilayah', 'longitude', 'latitude', 'zoom'], 'required'],
            [['id_jenis', 'id_wilayah', 'zoom'], 'integer'],
            [['longitude', 'latitude'], 'string', 'max' => 20],
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id_jenis' => 'id']],
            [['id_wilayah'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::className(), 'targetAttribute' => ['id_wilayah' => 'id']],
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
            'id_jenis' => 'Jenis Infrastruktur',
            'id_wilayah' => 'Wilayah',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'zoom' => 'Zoom',
            'approve' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuktiKejahatans()
    {
        return $this->hasMany(BuktiKejahatan::className(), ['id_gangguan_keamanan' => 'id']);
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
}
