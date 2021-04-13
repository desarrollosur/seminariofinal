<?php

use yii\db\Migration;

class m210413_115905_permiso_final_cuestionario extends Migration
{

    
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadCuestionarioFull');
        $permiso = $auth->createPermission('actividad_cuestionario_final-cuestionario');
        $auth->add($permiso);
        $auth->addChild($actividadFull, $permiso);

    }

    public function safeDown() {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadCuestionarioFull');
        $permiso = $auth->getPermission('actividad_cuestionario_final-cuestionario');
        $auth->removeChild($actividadFull, $permiso);

    }
}