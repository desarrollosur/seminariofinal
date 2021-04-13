<?php

use yii\db\Migration;

class m210413_114105_permiso_siguiente_pregunta_cuestionario extends Migration
{

    
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadCuestionarioFull');
        $permiso = $auth->createPermission('actividad_cuestionario_siguiente-pregunta');
        $auth->add($permiso);
        $auth->addChild($actividadFull, $permiso);

    }

    public function safeDown() {
        $auth = Yii::$app->authManager;
        $actividadFull = $auth->getRole('ActividadCuestionarioFull');
        $permiso = $auth->getPermission('actividad_cuestionario_siguiente-pregunta');
        $auth->removeChild($actividadFull, $permiso);

    }
}