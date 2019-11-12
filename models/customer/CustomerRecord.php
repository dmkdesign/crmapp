<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

class CustomerRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'string', 'max' => 256],
            //['birth_date', 'date', 'format' => 'Y-m-d'],
            [['notes','birth_date'], 'safe']
        ];
    }
//set phones relationship	
	public function getPhone()
	{
		return $this->hasOne(PhoneRecord::className(), ['customer_id'=>'id']);
    }
    public function behaviors()
    {
        return [
        
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ]
        
        ];
    }
}