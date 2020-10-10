<?php

use yii\db\Migration;

class m200309_121000_Pais_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_pais_index",
            "description" => "app/pais/index"
        ],
        "view" => [
            "name" => "app_pais_view",
            "description" => "app/pais/view"
        ],
        "create" => [
            "name" => "app_pais_create",
            "description" => "app/pais/create"
        ],
        "update" => [
            "name" => "app_pais_update",
            "description" => "app/pais/update"
        ],
        "delete" => [
            "name" => "app_pais_delete",
            "description" => "app/pais/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppPaisFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppPaisView" => [
            "index",
            "view"
        ],
        "AppPaisEdit" => [
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
