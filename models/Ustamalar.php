<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ustamalar".
 *
 * @property int $id
 * @property string $nomi
 * @property int $ustama
 *
 * @property Oylik[] $oyliks
 */
class Ustamalar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ustamalar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'ustama'], 'required'],
            [['ustama'], 'integer'],
            [['nomi'], 'string', 'max' => 256],
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
            'ustama' => 'Miqdori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOyliks()
    {
        return $this->hasMany(Oylik::className(), ['ustama_id' => 'id']);
    }
}
