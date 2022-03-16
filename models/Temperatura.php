<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temperatura".
 *
 * @property int $idtemperatura
 * @property float $temperatura
 * @property string $fecha
 * @property int $id_persona
 *
 * @property Persona $persona
 */
class Temperatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temperatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['temperatura', 'fecha', 'id_persona'], 'required'],
            [['temperatura'], 'number'],
            [['fecha'], 'safe'],
            [['id_persona'], 'integer'],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtemperatura' => 'ID',
            'temperatura' => 'Temperatura',
            'fecha' => 'Fecha',
            'id_persona' => 'Id Persona',
        ];
    }

    /**
     * Gets query for [[Persona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['idpersona' => 'id_persona']);
    }
}
