<?php

use yii\db\Migration;

class m170205_135024_add_column_to_brand extends Migration
{
    public function up()
    {
        $this->addColumn('brand', 'logo', 'string');
    }

    public function down()
    {
        $this->dropColumn('brand', 'logo');
    }
}
