<?php

use yii\db\Migration;

class m170212_172600_wideness_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('wideness', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Wideness name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('wideness');
    }

}
