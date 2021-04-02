<?php

use yii\db\Migration;

class m210402_180100_Cuestionario_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "actividad_cuestionario_index",
            "description" => "actividad/cuestionario/index"
        ],
        "view" => [
            "name" => "actividad_cuestionario_view",
            "description" => "actividad/cuestionario/view"
        ],
        "create" => [
            "name" => "actividad_cuestionario_create",
            "description" => "actividad/cuestionario/create"
        ],
        "update" => [
            "name" => "actividad_cuestionario_update",
            "description" => "actividad/cuestionario/update"
        ],
        "delete" => [
            "name" => "actividad_cuestionario_delete",
            "description" => "actividad/cuestionario/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "ActividadCuestionarioFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "ActividadCuestionarioView" => [
            "index",
            "view"
        ],
        "ActividadCuestionarioEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}