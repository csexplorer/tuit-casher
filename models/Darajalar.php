<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "darajalar".
 *
 * @property int $id
 * @property string $nomi
 * @property int $min_oylik
 *
 * @property Oqituvchilar[] $oqituvchilars
 */
class Darajalar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'darajalar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'min_oylik'], 'required'],
            [['min_oylik'], 'integer'],
            [['nomi'], 'string', 'max' => 64],
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
            'min_oylik' => 'Min Oylik',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOqituvchilars()
    {
        return $this->hasMany(Oqituvchilar::className(), ['darajasi' => 'id']);
    }
}
