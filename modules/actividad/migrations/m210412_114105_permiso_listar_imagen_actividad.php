<?php

use yii\db\Migration;

class m210412_114105_permiso_listar_imagen_actividad extends Migration
{

    
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadActividadFull');
        $permisoListarImagenActividad = $auth->createPermission('actividad_actividad_imagen-actividad');
        $auth->add($permisoListarImagenActividad);
        $auth->addChild($actividadFull, $permisoListarImagenActividad);

    }

    public function safeDown() {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadActividadFull');
        $permisoListarImagenActividad = $auth->getPermission('actividad_actividad_imagen');
        $auth->removeChild($actividadFull, $permisoRealizarCuestionario);

    }
}