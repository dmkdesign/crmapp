<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Customer ;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation'=>true,
        'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'notes')->textInput() ?>
    <?=  $form->field($model, 'sales_status')->dropDownList(Customer::getSalesStatusList(),['prompt'=>'-----Select Status------']); ?>
    <?= $form->field($phone, 'number')->textInput() ?>

 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php   echo \nemmo\attachments\components\AttachmentsInput::widget([
	'id' => 'file-input', // Optional
	'model' => $model,
	'options' => [ // Options of the Kartik's FileInput widget
        'multiple' => false, // If you want to allow multiple upload, default to false
        'resizeImages'=>true,
	],
	'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
        'maxFileCount' => 1, // Client max files
        //'allowedPreviewTypes'=>false
	]
]);
?>
    <?php ActiveForm::end(); ?>
    
</div>
