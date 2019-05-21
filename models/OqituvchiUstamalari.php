<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oqituvchi_ustamalari".
 *
 * @property int $id
 * @property int $oqt_id
 * @property int $ustama_id
 *
 * @property Oqituvchilar $oqt
 * @property Ustamalar $ustama
 */
class OqituvchiUstamalari extends \yii\db\ActiveRecord
{
    public $totalCount = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oqituvchi_ustamalari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oqt_id', 'ustama_id'], 'required'],
            [['oqt_id', 'ustama_id'], 'integer'],
            [['oqt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oqituvchilar::className(), 'targetAttribute' => ['oqt_id' => 'id']],
            [['ustama_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ustamalar::className(), 'targetAttribute' => ['ustama_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'oqt_id' => 'Oqt ID',
            'ustama_id' => 'Ustama ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOqt()
    {
        return $this->hasOne(Oqituvchilar::className(), ['id' => 'oqt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUstama()
    {
        return $this->hasOne(Ustamalar::className(), ['id' => 'ustama_id']);
    }
}
