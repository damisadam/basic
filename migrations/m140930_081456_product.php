<?php

use yii\db\Schema;
use yii\db\Migration;

class m140930_081456_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'p_id' => Schema::TYPE_PK,
            'p_name' => Schema::TYPE_STRING . ' NOT NULL',
            'p_price' => Schema::TYPE_STRING . '(32) NOT NULL',
            'p_sku' => Schema::TYPE_STRING . ' NOT NULL',
            'p_quantity' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
