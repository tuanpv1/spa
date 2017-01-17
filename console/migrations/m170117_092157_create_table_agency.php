<?php

use yii\db\Migration;

class m170117_092157_create_table_agency extends Migration
{
    public function up()
    {
        $this->createTable('table_agency', [
            'id' => $this->primaryKey(),
            'name' => $this->string(500),
            'status' => $this->integer(11),
            'phone_number' => $this->string(50),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);
    }

    public function down()
    {
        $this->dropTable('table_agency');
    }
}
