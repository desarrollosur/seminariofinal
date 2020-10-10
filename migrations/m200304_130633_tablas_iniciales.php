<?php

use yii\db\Migration;

/**
 * Class m200304_130633_tablas_iniciales
 */
class m200304_130633_tablas_iniciales extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->createTable('pais', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);
        
        $this->addForeignKey('fk-pais-creado_porid', 'pais', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-pais-actualizado_porid', 'pais', 'creado_porid', 'user', 'id');
        
        
        $this->createTable('tipo_dni', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);

        $this->addForeignKey('fk-tipo_dni-creado_porid', 'tipo_dni', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-tipo_dni-actualizado_porid', 'tipo_dni', 'creado_porid', 'user', 'id');
        
        $this->createTable('persona', [
            'id'=>$this->primaryKey(),
            'nombre'=>$this->string()->notNull(),
            'apellido'=>$this->string()->notNull(),
            'tipo_dniid'=>$this->integer(),
            'dni'=>$this->string()->notNull(),
            'fecha_nacimiento'=>$this->date(),
            'telefono'=>$this->string(),
            'nacionalidadid'=>$this->integer(),
            'domicilio'=>$this->string(),
            'email'=>$this->string(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);
        
        $this->addForeignKey('fk-persona-nacionalidadid', 'persona', 'nacionalidadid', 'pais', 'id');
        $this->addForeignKey('fk-persona-tipo_dniid', 'persona', 'tipo_dniid', 'tipo_dni', 'id');
        $this->addForeignKey('fk-persona-creado_porid', 'persona', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-persona-actualizado_porid', 'persona', 'creado_porid', 'user', 'id');
                        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200304_130633_tablas_iniciales cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200304_130633_tablas_iniciales cannot be reverted.\n";

        return false;
    }
    */
}
