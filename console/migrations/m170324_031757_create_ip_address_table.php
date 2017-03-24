<?php

use yii\db\Migration;

class m170324_031757_create_ip_address_table extends Migration
{
    public function up()
    {
        $this->createTable('ip_address_table', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(),
            'number' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('ip_address_table');
    }
}
