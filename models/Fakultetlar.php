<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultetlar".
 *
 * @property int $id
 * @property string $nomi
 * @property string $dekan_fio
 *
 * @property Kafedralar[] $kafedralars
 */
class Fakultetlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultetlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'dekan_fio'], 'required'],
            [['nomi'], 'string', 'max' => 256],
            [['dekan_fio'], 'string', 'max' => 128],
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
            'dekan_fio' => 'Dekan Fio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedralars()
    {
        return $this->hasMany(Kafedralar::className(), ['fakultet_id' => 'id']);
    }
}
