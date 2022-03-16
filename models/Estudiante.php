<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $idestudiante
 * @property string $matricula
 * @property int $id_persona
 * @property int $id_grupo
 *
 * @property Grupo $grupo
 * @property Persona $persona
 */
class Estudiante extends \yii\db\ActiveRecord
{
    var $nombre;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matricula', 'id_persona', 'id_grupo'], 'required'],
            [['id_persona', 'id_grupo'], 'integer'],
            [['matricula'], 'string', 'max' => 45],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['id_grupo' => 'idgrupo']],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestudiante' => 'Idestudiante',
            'matricula' => 'Matricula',
            'id_persona' => 'Id Persona',
            'id_grupo' => 'Id Grupo',
        ];
    }

    /**
     * Gets query for [[Grupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'id_grupo']);
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

    public function getGradoGrupo()
    {
        if ($this->persona != null)
            return $this->grado->grado."° '".$this->grado->grupo."'";
        else
            return "";
    }
}
