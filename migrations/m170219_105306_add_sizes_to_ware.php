<?php

use yii\db\Migration;

class m170219_105306_add_sizes_to_ware extends Migration
{
        public function up()
    {
        $this->addColumn('ware', 'sizes', 'string');
    }

    public function down()
    {
        $this->dropColumn('ware', 'sizes');
    }
}
