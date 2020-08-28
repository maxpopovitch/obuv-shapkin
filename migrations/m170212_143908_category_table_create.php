<?php

use yii\db\Migration;

class m170212_143908_category_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Category name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('category');
    }

}
