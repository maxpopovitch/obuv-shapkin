<?php

use yii\db\Migration;

class m170212_155429_heel_height_table_create extends Migration {

    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('heel_height', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Heel height name')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('heel_height');
    }

}
