<?php

use yii\db\Migration;

class m170515_170149_subscribers_table_create extends Migration
{
    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('subscriber', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->comment('Email')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('subscriber');
    }
}
