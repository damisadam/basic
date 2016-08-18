<?php

use yii\db\Schema;
use yii\db\Migration;

class m141001_062358_personal_detail extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%personal_detail}}', [
            'p_id' => Schema::TYPE_PK,
            'p_name' => Schema::TYPE_STRING . ' NOT NULL',
            'p_nick_name' => Schema::TYPE_STRING . ' NOT NULL',
            'p_DOB' => Schema::TYPE_STRING . ' NOT NULL',
            'p_fname' => Schema::TYPE_STRING . ' NOT NULL',
            'p_pic' => Schema::TYPE_STRING . ' NOT NULL',
            'p_gender' => Schema::TYPE_STRING . ' NOT NULL',
            'p_Skill' => Schema::TYPE_STRING . ' NOT NULL',
            'p_email' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%personal_detail}}');
    }
}
