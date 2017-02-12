<?php

use yii\db\Migration;

class m170212_170017_lining_materials_table_create extends Migration
{
    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('lining_material', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Lining material name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('lining_material');
    }

}
