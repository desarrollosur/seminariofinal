<?php

use yii\db\Migration;

/**
 * Class m210402_210653_roles_cuestionario_actividad_hijos_admin
 */
class m210402_210653_roles_cuestionario_actividad_hijos_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = \Yii::$app->authManager;
        $rolAdmin = $auth->getRole('admin');
        $rolActividad = $auth->getRole('ActividadActividadFull');
        $rolCuestionario = $auth->getRole('ActividadCuestionarioFull');
        $auth->addChild($rolAdmin, $rolActividad);
        $auth->addChild($rolAdmin, $rolCuestionario);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = \Yii::$app->authManager;
        $rolAdmin = $auth->getRole('admin');
        $rolActividad = $auth->getRole('ActividadActividadFull');
        $rolCuestionario = $auth->getRole('ActividadCuestionarioFull');
        $auth->removeChild($rolAdmin, $rolActividad);
        $auth->removeChild($rolAdmin, $rolCuestionario);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210402_210653_roles_cuestionario_actividad_hijos_admin cannot be reverted.\n";

        return false;
    }
    */
}
