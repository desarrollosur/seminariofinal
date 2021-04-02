<?php

use yii\db\Migration;

class m210402_175900_Actividad_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "actividad_actividad_index",
            "description" => "actividad/actividad/index"
        ],
        "view" => [
            "name" => "actividad_actividad_view",
            "description" => "actividad/actividad/view"
        ],
        "create" => [
            "name" => "actividad_actividad_create",
            "description" => "actividad/actividad/create"
        ],
        "update" => [
            "name" => "actividad_actividad_update",
            "description" => "actividad/actividad/update"
        ],
        "delete" => [
            "name" => "actividad_actividad_delete",
            "description" => "actividad/actividad/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "ActividadActividadFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "ActividadActividadView" => [
            "index",
            "view"
        ],
        "ActividadActividadEdit" => [
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