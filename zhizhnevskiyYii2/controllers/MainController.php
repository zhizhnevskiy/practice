<?php
namespace app\controllers;

use app\models\MyDB;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex(){
        $mydb = MyDB::find()->all();
        return $this->render('index', compact('mydb'));
    }
}