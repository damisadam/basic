<?php

use yii\db\Schema;
use yii\db\Migration;

class m141003_055025_product_fk extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE product
ADD pro_id INTEGER ');
   $this->execute('ALTER TABLE product
ADD FOREIGN KEY (pro_id)
REFERENCES personal_detail(p_id)');
    }

    public function down()
    {
        $this->dropColumn('product','pro_id');

       // $this->dropTable('{{%personal_detail}}');
    }
}
