<?php

use yii\db\Migration;

class m170212_171413_upper_material_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('upper_material', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Upper material name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('upper_material');
    }

}
