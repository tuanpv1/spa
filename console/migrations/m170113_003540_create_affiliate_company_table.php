<?php

use yii\db\Migration;

/**
 * Handles the creation of table `affiliate_company`.
 */
class m170113_003540_create_affiliate_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('affiliate_company', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'name' => $this->string(),
            'about' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'url' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('affiliate_company');
    }
}
