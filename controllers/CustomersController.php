<?php
namespace app\controllers;

use yii\web\Controller;

class CustomersController extends Controller
{
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();
        return $this->render('index', compact('records'));
    }
}