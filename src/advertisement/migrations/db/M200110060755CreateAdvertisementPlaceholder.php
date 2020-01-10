<?php

namespace ant\advertisement\migrations\db;

use ant\db\Migration;

/**
 * Class M200110080755CreateAdvertisementPlaceholder
 */
class M200110060755CreateAdvertisementPlaceholder extends Migration
{
	protected $tableName = '{{%advertisement_placeholder}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		 $this->createTable($this->tableName, [
			'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->null(),
            'handle' => $this->string(50)->notNull()->unique(),
			'setting' => $this->text()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->defaultValue(0),
        ], $this->getTableOptions());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M200110080755CreateAdvertisementPlaceholder cannot be reverted.\n";

        return false;
    }
    */
}
