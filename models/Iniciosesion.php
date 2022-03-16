<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inicio_sesion".
 *
 * @property int $idinicioSesion
 * @property string $correo
 * @property string $contraseña
 * @property int $id_persona
 *
 * @property Persona $persona
 */
class InicioSesion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inicio_sesion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['correo', 'contraseña', 'id_persona'], 'required'],
            [['id_persona'], 'integer'],
            [['correo', 'contraseña'], 'string', 'max' => 45],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idinicioSesion' => 'Idinicio Sesion',
            'correo' => 'Correo',
            'contraseña' => 'Contraseña',
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
