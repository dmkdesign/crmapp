<?php
use app\models\customer\CustomerRecord;
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
                return $data->salesStatus;
            }],
            ['label' => 'Phone Number', 'attribute' => 'phone',
		'value'=>function($data)
            {
		if(!empty($data->phone))
                	return $data->phone->number;
            }
		]
        ]
    ]
);

echo \nemmo\attachments\components\AttachmentsTable::widget([
	'model' => $model,
	//'showDeleteButton' => false, // Optional. Default value is true
]);