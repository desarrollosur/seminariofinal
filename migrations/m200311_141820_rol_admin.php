<?php

use yii\db\Migration;
use Yii;

/**
 * Class m200311_141820_rol_admin
 */
class m200311_141820_rol_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $auth->add($admin);        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200311_141820_rol_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200311_141820_rol_admin cannot be reverted.\n";

        return false;
    }
    */
}
