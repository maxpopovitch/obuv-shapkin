<?php

use yii\db\Migration;

class m170226_160207_add_images_to_ware extends Migration
{
        public function up()
    {
        $this->addColumn('ware', 'file_extension', 'string');
        $this->addColumn('ware', 'file_version', 'integer');
    }

    public function down()
    {
        $this->dropColumn('ware', 'file_extension');
        $this->dropColumn('ware', 'file_version');
    }
}
