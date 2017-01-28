<?php

use yii\db\Migration;

class m170128_154147_table_test_create extends Migration {

    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('explanation comment goes here'),
            'age' => $this->integer()->notNull()->comment('here goes another one explanation comment'),
            'children_number' => $this->integer()->defaultValue(0)->comment('you will not believe me...')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('test');
    }
}
