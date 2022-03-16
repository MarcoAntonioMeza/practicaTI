<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $idpersona
 * @property string $nombre
 * @property string $apellidos
 *
 * @property Estudiante[] $estudiantes
 * @property InicioSesion[] $inicioSesions
 * @property Personal[] $personals
 * @property Temperatura[] $temperaturas
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos'], 'required'],
            [['nombre', 'apellidos'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersona' => 'Idpersona',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_persona' => 'idpersona']);
    }

    /**
     * Gets query for [[InicioSesions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInicioSesions()
    {
        return $this->hasMany(InicioSesion::className(), ['id_persona' => 'idpersona']);
    }

    /**
     * Gets query for [[Personals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['id_persona' => 'idpersona']);
    }

    /**
     * Gets query for [[Temperaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemperaturas()
    {
        return $this->hasMany(Temperatura::className(), ['id_persona' => 'idpersona']);
    }
}
