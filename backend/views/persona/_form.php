<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'departamento_id')->dropDownList(yii\helpers\ArrayHelper::map(common\models\Departamento::find()->all(), 'id', 'nombre'),['prompt'=>'Select...']);?> 
  
<?= $form->field($model, 'nombres')->dropDownList(yii\helpers\ArrayHelper::map(dektrium\user\models\User::find()->all(), 'id', 'username'),['prompt'=>'Select...']);?> 
  
  
  <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true])->input('punto_x', ['placeholder' => "Apellidos del usuario ingreselos"])  ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
