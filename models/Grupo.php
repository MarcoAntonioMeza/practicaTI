<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $idgrupo
 * @property string $grado
 * @property string $grupo
 * @property int $id_tutor
 *
 * @property GrupoEstudiante[] $grupoEstudiantes
 * @property Personal $tutor
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grado', 'grupo', 'id_tutor'], 'required'],
            [['id_tutor'], 'integer'],
            [['grado'], 'string', 'max' => 2],
            [['grupo'], 'string', 'max' => 1],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['id_tutor' => 'idpersonal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgrupo' => 'Idgrupo',
            'grado' => 'Grado',
            'grupo' => 'Grupo',
            'id_tutor' => 'Id Tutor',
        ];
    }

    /**
     * Gets query for [[GrupoEstudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoEstudiantes()
    {
        return $this->hasMany(GrupoEstudiante::className(), ['id_grupo' => 'idgrupo']);
    }

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Personal::className(), ['idpersonal' => 'id_tutor']);
    }
}
