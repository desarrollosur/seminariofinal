<?php

namespace app\models;

use Da\User\Model\User as BaseUser;
use yii\db\Query;

class User extends BaseUser
{
    
    // métodos de auditoría
    public static function userFilterCallback($userName)
    {
        $usr = User::findOne(['username'=>$userName]);
        if(!$usr)
            return null;
        return $usr->id;
    }

    public static function userIdentifierCallback($userId)
    {
        $usr = User::findOne($userId);
        if(!$usr)
            return null;
        return $usr->username;
        
    }
    
}
