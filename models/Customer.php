<?php

namespace app\models;

use Yii;
use app\models\customer\PhoneRecord;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $birth_date
 * @property string $notes
 * @property int $sales_status
 *
 * @property Phone $phone
 */
class Customer extends \yii\db\ActiveRecord
{
    public static $SALES_STATUS = ['closed'=>0, 'warm'=>1,'cold'=>2];
    /**
     * {@inheritdoc}
     */
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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['birth_date'], 'safe'],
            [['notes'], 'string'],
            [['sales_status'], 'integer'],
            ['birth_date', 'date','message'=>'Your date must be in the form yyyy-mm-dd', 'format' => 'php:Y-m-d'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birth_date' => 'Birth Date',
            'notes' => 'Notes',
            'sales_status' => 'Sales Status',
        ];
    }

    public function beforeDelete()
    {
        $phone = $this->phone;
        if(!empty($phone))
            $phone->delete();
        return parent::beforeDelete();
        
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhone()
    {
        return $this->hasOne(PhoneRecord::className(), ['customer_id' => 'id']);
    }

    public function getSalesStatus()
    {
        return array_flip(self::$SALES_STATUS)[$this->sales_status];
       
    }

    public static function getSalesStatusList()
    {
        $array = array_flip(self::$SALES_STATUS);
        return $array;
    }
    // /**
    //  * {@inheritdoc}
    //  * @return \app\models\queries\CustomerQuery the active query used by this AR class.
    //  */
    // public static function find()
    // {
    //     return new \app\models\queries\CustomerQuery(get_called_class());
    // }
}
