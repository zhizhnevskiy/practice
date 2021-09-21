<?php

namespace app\models;

use yii\db\ActiveRecord;

class MyDB extends ActiveRecord{

    public static function tableName()
    {
        return 'mydb';
    }

}