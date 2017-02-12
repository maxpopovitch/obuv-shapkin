<?php

use yii\db\Migration;

class m170212_173647_shoes_type_table_create extends Migration {

    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('shoes_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Shoes type')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('shoes_type');
    }

}
