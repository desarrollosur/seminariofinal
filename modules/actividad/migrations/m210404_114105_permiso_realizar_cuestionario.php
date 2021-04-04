<?php

use yii\db\Migration;

class m210404_114105_permiso_realizar_cuestionario extends Migration
{

    
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $cuestionarioFull = $auth->getRole('ActividadCuestionarioFull');
        $permisoRealizarCuestionario = $auth->createPermission('actividad_cuestionario_realizar-cuestionario');
        $auth->add($permisoRealizarCuestionario);
        $auth->addChild($cuestionarioFull, $permisoRealizarCuestionario);

    }

    public function safeDown() {
        $auth = Yii::$app->authManager;
        $cuestionarioFull = $auth->getRole('ActividadCuestionarioFull');
        $permisoRealizarCuestionario = $auth->createPermission('actividad_cuestionario_realizar-cuestionario');
        $auth->removeChild($cuestionarioFull, $permisoRealizarCuestionario);

    }
}