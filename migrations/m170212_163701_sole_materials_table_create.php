<?php

use yii\db\Migration;

class m170212_163701_sole_materials_table_create extends Migration {

    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('sole_material', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Sole material name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('sole_material');
    }

}
