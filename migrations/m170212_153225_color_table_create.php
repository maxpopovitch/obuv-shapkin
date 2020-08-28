<?php

use yii\db\Migration;

class m170212_153225_color_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('color', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Color name'),
            'hex_value' => $this->string()->notNull()->comment('HEX value')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('color');
    }

}
