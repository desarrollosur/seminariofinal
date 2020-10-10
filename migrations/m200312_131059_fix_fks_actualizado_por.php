<?php

use yii\db\Migration;

/**
 */
class m200312_131059_fix_fks_actualizado_por extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropForeignKey('fk-pais-actualizado_porid', 'pais');
        $this->addForeignKey('fk-pais-actualizado_porid', 'pais', 'actualizado_porid', 'user', 'id');
       
        $this->dropForeignKey('fk-tipo_dni-actualizado_porid', 'tipo_dni');
        $this->addForeignKey('fk-tipo_dni-actualizado_porid', 'tipo_dni', 'actualizado_porid', 'user', 'id');
        
        $this->dropForeignKey('fk-persona-actualizado_porid', 'persona');
        $this->addForeignKey('fk-persona-actualizado_porid', 'persona', 'actualizado_porid', 'user', 'id');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {

        return false;
    }
    */
}
