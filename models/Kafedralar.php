<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kafedralar".
 *
 * @property int $id
 * @property string $nomi
 * @property int $fakultet_id
 * @property string $mudir_fio
 *
 * @property Fakultetlar $fakultet
 * @property Oqituvchilar[] $oqituvchilars
 */
class Kafedralar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kafedralar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'fakultet_id', 'mudir_fio'], 'required'],
            [['fakultet_id'], 'integer'],
            [['nomi'], 'string', 'max' => 255],
            [['mudir_fio'], 'string', 'max' => 128],
            [['fakultet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultetlar::className(), 'targetAttribute' => ['fakultet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomi' => 'Nomi',
            'fakultet_id' => 'Fakultet ID',
            'mudir_fio' => 'Kafedra mudirining to\'liq nomi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultet()
    {
        return $this->hasOne(Fakultetlar::className(), ['id' => 'fakultet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOqituvchilars()
    {
        return $this->hasMany(Oqituvchilar::className(), ['kafedra_id' => 'id']);
    }
}
