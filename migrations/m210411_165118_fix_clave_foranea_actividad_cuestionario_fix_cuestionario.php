<?php

use yii\db\Migration;

/**
 * Class m210411_165118_fix_clave_foranea_actividad_cuestionario_fix_cuestionario
 */
class m210411_165118_fix_clave_foranea_actividad_cuestionario_fix_cuestionario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-cuestionario_actividad-cuestionarioid', 'cuestionario_actividad');
        $this->addForeignKey('fk-cuestionario_actividad-cuestionarioid', 'cuestionario_actividad', 'cuestionarioid', 'cuestionario', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210411_165118_fix_clave_foranea_actividad_cuestionario_fix_cuestionario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210411_165118_fix_clave_foranea_actividad_cuestionario_fix_cuestionario cannot be reverted.\n";

        return false;
    }
    */
}
