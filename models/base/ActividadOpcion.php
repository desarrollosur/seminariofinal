<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the base-model class for table "actividad_opcion".
 *
 * @property integer $id
 * @property string $pregunta
 * @property string $mensaje
 * @property boolean $opcion_correcta
 * @property integer $actividadid
 * @property integer $activo
 * @property string $fecha_actualizacion
 * @property integer $creado_porid
 * @property integer $actualizado_porid
 * @property integer $version
 * @property string $fecha_creacion
 *
 * @property \app\models\Actividad $actividad
 * @property \app\models\User $creadoPor
 * @property \app\models\User $actualizadoPor
 * @property \app\models\OpcionIntentoResolucion[] $opcionIntentoResolucions
 * @property string $aliasModel
 */
abstract class ActividadOpcion extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividad_opcion';
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
            [['pregunta', 'mensaje', 'actividadid'], 'required'],
            [['opcion_correcta'], 'boolean'],
            [['actividadid', 'activo', 'creado_porid', 'actualizado_porid', 'version'], 'default', 'value' => null],
            [['actividadid', 'activo', 'creado_porid', 'actualizado_porid', 'version'], 'integer'],
            [['fecha_actualizacion'], 'safe'],
            [['pregunta', 'mensaje'], 'string', 'max' => 255],
            [['actividadid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Actividad::className(), 'targetAttribute' => ['actividadid' => 'id']],
            [['creado_porid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['creado_porid' => 'id']],
            [['actualizado_porid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['actualizado_porid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pregunta' => 'Pregunta',
            'mensaje' => 'Mensaje',
            'opcion_correcta' => 'Opcion Correcta',
            'actividadid' => 'Actividadid',
            'activo' => 'Activo',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'creado_porid' => 'Creado Porid',
            'actualizado_porid' => 'Actualizado Porid',
            'version' => 'Version',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(\app\models\Actividad::className(), ['id' => 'actividadid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreadoPor()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'creado_porid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActualizadoPor()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'actualizado_porid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpcionIntentoResolucions()
    {
        return $this->hasMany(\app\models\OpcionIntentoResolucion::className(), ['actividad_opcionid' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\ActividadOpcionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ActividadOpcionQuery(get_called_class());
    }


}
