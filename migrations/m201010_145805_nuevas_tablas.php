<?php

use yii\db\Migration;

/**
 * Class m201010_145805_nuevas_tablas
 */
class m201010_145805_nuevas_tablas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('multimedia', [
            'id'=>$this->primaryKey(),
            'nombre_archivo'=>$this->string()->notNull(),
            'tipo'=>$this->string()->notNull(),
            'activo'=>$this->boolean()->defaultValue(true), // para soft delete
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior     
        ]);
        
        $this->addForeignKey('fk-multimedia-creado_porid', 'multimedia', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-multimedia-actualizado_porid', 'multimedia', 'actualizado_porid', 'user', 'id');

        $this->createTable('categoria', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior     
        ]);

        $this->addForeignKey('fk-categoria-creado_porid', 'categoria', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-categoria-actualizado_porid', 'categoria', 'actualizado_porid', 'user', 'id');
        
        
        $this->createTable('subcategoria', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'categoriaid'=>$this->integer()->notNull(), // categoría padre
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior     
        ]);
        
        $this->addForeignKey('fk-subcategoria-creado_porid', 'subcategoria', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-subcategoria-actualizado_porid', 'subcategoria', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-subcategoria-categoriaid', 'subcategoria', 'categoriaid', 'categoria', 'id');
        
        
        $this->createTable('actividad', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'subcategoriaid'=>$this->integer()->notNull(),
            'dificultad'=>$this->integer()->notNull(),
            'multimediaid'=>$this->integer()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);

        $this->addForeignKey('fk-actividad-creado_porid', 'actividad', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-actividad-actualizado_porid', 'actividad', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-actividad-subcategoriaid', 'actividad', 'subcategoriaid', 'subcategoria', 'id');
        $this->addForeignKey('fk-actividad-multimediaid', 'actividad', 'multimediaid', 'multimedia', 'id');
        
        $this->createTable('actividad_opcion', [
            'id'=>$this->primaryKey(),
            'pregunta'=>$this->string()->notNull(),
            'mensaje'=>$this->string()->notNull(),
            'opcion_correcta'=>$this->boolean()->defaultValue(false)->notNull(),
            'actividadid'=>$this->integer()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);
        
        $this->addForeignKey('fk-actividad_opcion-creado_porid', 'actividad_opcion', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-actividad_opcion-actualizado_porid', 'actividad_opcion', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-actividad_opcion-actividadid', 'actividad_opcion', 'actividadid', 'actividad', 'id');
     
        
        
        $this->createTable('cuestionario', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);

        $this->addForeignKey('fk-cuestionario-creado_porid', 'cuestionario', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-cuestionario-actualizado_porid', 'cuestionario', 'actualizado_porid', 'user', 'id');
        
        $this->createTable('cuestionario_actividad', [
            'cuestionarioid'=>$this->integer()->notNull(),
            'actividadid'=>$this->integer()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);
        
        $this->addPrimaryKey('cuestionario_actividad_pk', 'cuestionario_actividad', ['cuestionarioid', 'actividadid']);
        $this->addForeignKey('fk-cuestionario_actividad-creado_porid', 'cuestionario_actividad', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-cuestionario_actividad-actualizado_porid', 'cuestionario_actividad', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-cuestionario_actividad-cuestionarioid', 'cuestionario_actividad', 'cuestionarioid', 'actividad', 'id');
        $this->addForeignKey('fk-cuestionario_actividad-actividadid', 'cuestionario_actividad', 'actividadid', 'cuestionario', 'id');
        
        
        $this->createTable('tipo_finalizacion_cuestionario', [
            'id'=>$this->primaryKey(),
            'descripcion'=>$this->string(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);

        $this->addForeignKey('fk-tipo_finalizacion_cuestionario-creado_porid', 'tipo_finalizacion_cuestionario', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-tipo_finalizacion_cuestionario-actualizado_porid', 'tipo_finalizacion_cuestionario', 'actualizado_porid', 'user', 'id');
        
        
        $this->createTable('intento_resolucion', [
            'id'=>$this->primaryKey(),
            'userid'=>$this->integer()->notNull(),
            'cuestionarioid'=>$this->integer()->notNull(),
            'tipo_finalizacion_cuestionarioid'=>$this->integer()->notNull(),
            'retroalimentacion'=>$this->string(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);
        
        $this->addForeignKey('fk-intento_resolucion-creado_porid', 'intento_resolucion', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-intento_resolucion-actualizado_porid', 'intento_resolucion', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-intento_resolucion-userid', 'intento_resolucion', 'userid', 'user', 'id');
        $this->addForeignKey('fk-intento_resolucion-cuestionarioid', 'intento_resolucion', 'cuestionarioid', 'cuestionario', 'id');
        $this->addForeignKey('fk-intento_resolucion-tipo_finalizacion_cuestionarioid', 'intento_resolucion', 'tipo_finalizacion_cuestionarioid', 'tipo_finalizacion_cuestionario', 'id');

        $this->createTable('opcion_intento_resolucion', [
            'id'=>$this->primaryKey(),
            'intento_resolucionid'=>$this->integer()->notNull(),
            'actividad_opcionid'=>$this->integer()->notNull(),
            'activo'=>$this->integer()->defaultValue(1),
            'fecha_creacion'=>$this->timestamp(), // para timestamp behavior
            'fecha_actualizacion'=>$this->timestamp(), // para timestamp behavior
            'creado_porid'=>$this->integer(), // para blame behavior
            'actualizado_porid'=>$this->integer(), // para blame behavior
            'version'=>$this->integer()->defaultValue(0) // para optimistic lock behavior
        ]);

        $this->addForeignKey('fk-opcion_intento_resolucion-creado_porid', 'opcion_intento_resolucion', 'creado_porid', 'user', 'id');
        $this->addForeignKey('fk-opcion_intento_resolucion-actualizado_porid', 'opcion_intento_resolucion', 'actualizado_porid', 'user', 'id');
        $this->addForeignKey('fk-opcion_intento_resolucion-intento_resolucionid', 'opcion_intento_resolucion', 'intento_resolucionid', 'intento_resolucion', 'id');
        $this->addForeignKey('fk-opcion_intento_resolucion-actividad_opcionid', 'opcion_intento_resolucion', 'actividad_opcionid', 'actividad_opcion', 'id');
                        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201010_145805_nuevas_tablas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201010_145805_nuevas_tablas cannot be reverted.\n";

        return false;
    }
    */
}
