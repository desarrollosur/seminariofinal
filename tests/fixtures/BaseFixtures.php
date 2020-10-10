<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\tests\fixtures;
use yii\test\ActiveFixture;
use yii\db\Query;

/**
 * Description of BaseFixtures
 *
 * @author mboisselier
 */
abstract class BaseFixtures extends ActiveFixture
{

    public function load()
    {
        $this->data = [];
        $table = $this->getTableSchema();
        foreach ($this->getData() as $alias => $row) {
            $primaryKeys = $this->db->schema->insert($table->fullName, $row);
            $this->data[$alias] = array_merge($row, $primaryKeys);
        }
        if ($table->sequenceName !== null && count($primaryKeys) > 0) {
            //recalculate sequence based on last inserted id
            $primaryKey = key($primaryKeys);
            $lastId = (new Query())->select('max('. $primaryKey .')')->from($table->fullName)->scalar()+1;
            $this->db->createCommand()->resetSequence($table->fullName, $lastId)->execute();
    }
}
}
