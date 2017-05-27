<?php

use yii\db\Migration;

class m170527_162123_messaging_table_create extends Migration
{
    public function up() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('messaging', [
            'id' => $this->primaryKey(),
            'emails' => $this->text()->notNull()->comment('Email list'),
            'created' => $this->integer()->notNull()->comment('Creation date'),
            'sent' => $this->integer()->notNull()->comment('Sending date'),
            'status' => $this->integer()->notNull()->comment('Message status'),
            'subject' => $this->string()->notNull()->comment('Message subject'),
            'content' => $this->text()->notNull()->comment('Message body'),
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('messaging');
    }
}
