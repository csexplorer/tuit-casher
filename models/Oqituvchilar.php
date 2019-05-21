<?php

namespace app\models;

use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "oqituvchilar".
 *
 * @property int $id
 * @property string $ismi
 * @property string $familiyasi
 * @property string $otasining_ismi
 * @property int $fani
 * @property int $fakultet_id
 * @property int $kafedra_id
 * @property int $darajasi
 *
 * @property OqituvchiUstamalari[] $oqituvchiUstamalaris
 * @property Kafedralar $kafedra
 * @property Darajalar $darajasi0
 * @property Fakultetlar $fakultet
 * @property Oylik[] $oyliks
 */
class Oqituvchilar extends \yii\db\ActiveRecord {

    public $multi_ustamalar;
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'oqituvchilar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ismi', 'familiyasi', 'otasining_ismi', 'fakultet_id', 'kafedra_id', 'darajasi'], 'required'],
            [['fani', 'fakultet_id', 'kafedra_id', 'darajasi'], 'integer'],
            [['ismi', 'familiyasi', 'otasining_ismi'], 'string', 'max' => 64],
            ['avatar', 'string', 'max' => 512],
            ['multi_ustamalar', 'safe'],
            [['file'], 'file', 'extensions' => 'png jpg'],
            [['kafedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kafedralar::className(), 'targetAttribute' => ['kafedra_id' => 'id']],
            [['darajasi'], 'exist', 'skipOnError' => true, 'targetClass' => Darajalar::className(), 'targetAttribute' => ['darajasi' => 'id']],
            [['fakultet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultetlar::className(), 'targetAttribute' => ['fakultet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ismi' => 'Ismi',
            'familiyasi' => 'Familiyasi',
            'otasining_ismi' => 'Otasining Ismi',
            'fani' => 'Fani',
            'fakultet_id' => 'Fakultet ID',
            'kafedra_id' => 'Kafedra ID',
            'darajasi' => 'Darajasi',
            'file' => 'Shaxsiy fotosurat',
            'multi_ustamalar' => 'Ustamalar'
        ];
    }

    public function getFio() {
        return $this->familiyasi . " " . $this->ismi . " " . $this->otasining_ismi;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOqituvchiUstamalaris() {
        return $this->hasMany(OqituvchiUstamalari::className(), ['oqt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra() {
        return $this->hasOne(Kafedralar::className(), ['id' => 'kafedra_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDarajasi0() {
        return $this->hasOne(Darajalar::className(), ['id' => 'darajasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultet() {
        return $this->hasOne(Fakultetlar::className(), ['id' => 'fakultet_id']);
    }

    public function jamiOylik($model) {
        $oqt_ustamalari = [];
        foreach ($model->oqituvchiUstamalaris as $oust) {
            $oqt_ustamalari[] = Ustamalar::find()->where(['id' => $oust->ustama_id])->one()->ustama;
        }
        
        $oylik = (array_sum($oqt_ustamalari) / 100 + 1) * $model->darajasi0->min_oylik;

        $str_oylik = strrev(strval($oylik));
        $readeble_oylik = strrev(chop(chunk_split($str_oylik, 3, " ")));
        return  $readeble_oylik . " so'm";
    }

    public function upload() {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }

}
