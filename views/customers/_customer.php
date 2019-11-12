<?php
echo \yii\widgets\DetailView::widget(
    [
        'model' => $model,
        'attributes' => [
            ['attribute' => 'name'],
            ['attribute' => 'birth_date'],
            'notes:text',
            ['attribute'=>'status',
            'value'=>function($data)
            {
                return Customer::$SALES_STATUS($data->status);
            }
           // ['label' => 'Phone Number', 'attribute' => 'phone']
        ]
    ]
);

echo \nemmo\attachments\components\AttachmentsTable::widget([
	'model' => $model,
	//'showDeleteButton' => false, // Optional. Default value is true
]);