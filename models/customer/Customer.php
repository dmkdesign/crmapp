<?php
namespace app\models\customer;

class Customer extends CustomerRecord
{
    

    /** @var PhoneRecord[] */
    

    public function behaviors()
    {
        return [
        
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ]
        
        ];
    }
	
}