<?php

use yii\db\Migration;

class m170212_175349_size_table_create extends Migration {

    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('size', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Size')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('size');
    }

}
