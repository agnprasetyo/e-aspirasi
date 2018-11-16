<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%transaksi_infrastruktur}}".
 *
 * @property int $id
 * @property int $id_user
 * @property string $tanggal
 * @property int $id_jenis
 * @property int $id_wilayah
 * @property int $id_status
 * @property string $longitude
 * @property string $latitude
 * @property int $zoom
 * @property int $approve
 *
 * @property BuktiInfrastruktur[] $buktiInfrastrukturs
 * @property User $user
 * @property StatusInfrastruktur $status
 * @property Jenis $jenis
 * @property Wilayah $wilayah
 */
class TransaksiInfrastruktur extends \yii\db\ActiveRecord
{
    const STATUS_NOT_APPROVED = 0;
    const STATUS_APPROVED     = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaksi_infrastruktur}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_wilayah', 'id_status', 'longitude', 'latitude', 'zoom'], 'required'],
            [['id_jenis', 'id_wilayah', 'id_status', 'zoom'], 'integer'],
            [['longitude', 'latitude'], 'string', 'max' => 255],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusInfrastruktur::className(), 'targetAttribute' => ['id_status' => 'id']],
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
            'id_status' => 'Status Infrastruktur',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'zoom' => 'Zoom',
            'approve' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuktiInfrastrukturs()
    {
        return $this->hasMany(BuktiInfrastruktur::className(), ['id_infrastruktur' => 'id']);
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
    public function getStatus()
    {
        return $this->hasOne(StatusInfrastruktur::className(), ['id' => 'id_status']);
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
