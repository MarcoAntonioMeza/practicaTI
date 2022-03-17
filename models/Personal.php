<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $idpersonal
 * @property string $grado
 * @property int $id_persona
 * @property int $id_cargo
 *
 * @property Cargo $cargo
 * @property Grupo[] $grupos
 * @property Persona $persona
 */
class Personal extends \yii\db\ActiveRecord
{
    var $nombre;
    var $apellidos;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grado', 'id_persona', 'id_cargo'], 'required'],
            [['id_persona', 'id_cargo'], 'integer'],
            [['grado'], 'string', 'max' => 10],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'idcargo']],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonal' => 'Personal',
            'grado' => 'Grado',
            'id_persona' => 'Persona',
            'id_cargo' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['idcargo' => 'id_cargo']);
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['id_tutor' => 'idpersonal']);
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

    public function getNombre()
    {
        if ($this->persona != null)
            return $this->persona->nombre;
        else
            return "";
    }

    public function getApellidos()
    {
        if ($this->persona != null)
            return $this->persona->apellidos;
        else
            return "";
    }

    public function getNombreCompleto()
    {
        if ($this->persona != null)
            return $this->persona->nombre. " ".$this->persona->apellidos;
        else
            return "";
    }
    public function getNombreCargo()
    {
        if ($this->cargo != null)
            return $this->cargo->nombre;
        else
            return "";
    }
}
