<?php

use yii\db\Schema;
use yii\db\Migration;

class m141003_072142_add_behavior extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE personal_detail
ADD created_at INTEGER ');
        $this->execute('ALTER TABLE personal_detail
ADD updated_at INTEGER  ');
    }

    public function down()
    {
        $this->dropColumn('personal_detail','updated_at');
        $this->dropColumn('personal_detail','created_at');
    }
}
