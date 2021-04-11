<?php

use yii\db\Migration;

/**
 * Class m210411_164258_fix_clave_foranea_actividad_cuestionario
 */
class m210411_164258_fix_clave_foranea_actividad_cuestionario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-cuestionario_actividad-actividadid', 'cuestionario_actividad');
        $this->addForeignKey('fk-cuestionario_actividad-actividadid', 'cuestionario_actividad', 'actividadid', 'actividad', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210411_164258_fix_clave_foranea_actividad_cuestionario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210411_164258_fix_clave_foranea_actividad_cuestionario cannot be reverted.\n";

        return false;
    }
    */
}
