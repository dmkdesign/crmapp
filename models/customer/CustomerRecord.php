<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

class CustomerRecord extends ActiveRecord
{
    public static $SALES_STATUS = ['closed'=>0, 'warm'=>1,'cold'=>2];
    public static function tableName()
    {
        return 'customer';
    }

    public function behaviors()
    {
        return [
        
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ]
        
        ];
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

    public static function getSalesStatusList()
    {
        $array = array_flip(self::$SALES_STATUS);
        return $array;
    }
   
}