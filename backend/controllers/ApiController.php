<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;
use yii\rest\ActiveController;
class ApiController extends ActiveController
{
    public $modelClass = 'common\models\Producto';
    
    public function actions() {
        $actions=parent::actions();
        unset($actions['index']);
        return $actions;
    }
    
    // SUMANDO CONSUMO SEGUN LA PERSONA QUE YO PIDA
    public function actionIndex($usuario){
        $query = \common\models\Producto::find();
        $query->andWhere(['persona_id'=>$usuario])->sum('precio');
        return $query->all();
    }
}