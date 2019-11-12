<?php
use app\models\customer\CustomerRecord;
use app\models\customer\PhoneRecord;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * Add Custimer UI.
 *
 * @var View $this
 * @var CustomerRecord $customer
 * @var PhoneRecord $phone
 */

$form = ActiveForm::begin([
    'id' => 'add-customer-form',
'options' => ['enctype' => 'multipart/form-data']
]);

echo $form->errorSummary([$customer, $phone]);
echo $form->field($customer, 'name');
echo $form->field($customer, 'birth_date');
echo $form->field($customer, 'notes');

echo $form->field($phone, 'number');

echo \nemmo\attachments\components\AttachmentsInput::widget([
	'id' => 'file-input', // Optional
	'model' => $customer,
	'options' => [ // Options of the Kartik's FileInput widget
		'multiple' => false, // If you want to allow multiple upload, default to false
	],
	'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
		'maxFileCount' => 1 // Client max files
	]
]);

echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);
ActiveForm::end();