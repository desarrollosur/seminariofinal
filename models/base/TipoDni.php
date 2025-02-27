<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use app\models\Persona;
use app\models\query\TipoDniQuery;
use app\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the base-model class for table "tipo_dni".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $activo
 * @property integer $version
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $creado_porid
 * @property integer $actualizado_porid
 *
 * @property Persona[] $personas
 * @property User $creadoPor
 * @property User $actualizadoPor
 * @property string $aliasModel
 */
abstract class TipoDni extends ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_dni';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'creado_porid',
                'updatedByAttribute' => 'actualizado_porid',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'fecha_creacion',
                'updatedAtAttribute' => 'fecha_actualizacion',
                'value'=>new Expression('NOW()')
                
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['activo', 'version'], 'default', 'value' => null],
            [['activo', 'version'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['creado_porid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_porid' => 'id']],
            [['actualizado_porid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actualizado_porid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Tipo DNI',
            'activo' => 'Activo',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'creado_porid' => 'Creado Porid',
            'actualizado_porid' => 'Actualizado Porid',
            'version' => 'Version',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipo_dniid' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCreadoPor()
    {
        return $this->hasOne(User::className(), ['id' => 'creado_porid']);
    }

    /**
     * @return ActiveQuery
     */
    public function getActualizadoPor()
    {
        return $this->hasOne(User::className(), ['id' => 'actualizado_porid']);
    }


    
    /**
     * @inheritdoc
     * @return TipoDniQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoDniQuery(get_called_class());
    }


}
