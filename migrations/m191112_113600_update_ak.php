<?php

use yii\db\Migration;

class m191112_113600_update_ak extends Migration
{
    public function up()
    {
        $this->addColumn(
            'customer','sales_status',$this->integer()->defaultValue('1')
        );

    }

    public function down()
    {

        $this->dropColumn('customer','sales_status');
    }
}
