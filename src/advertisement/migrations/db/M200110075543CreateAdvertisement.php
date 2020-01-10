<?php

namespace ant\advertisement\migrations\db;

use ant\db\Migration;

/**
 * Class M200110075543CreateAdvertisement
 */
class M200110075543CreateAdvertisement extends Migration
{
	protected $tableName = '{{%advertisement}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		 $this->createTable($this->tableName, [
			'id' => $this->primaryKey()->unsigned(),
            'placeholder_id' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string()->null(),
            'source_url' => $this->string()->null(),
            'target_url' => $this->string()->null(),
            'content' => $this->text()->null(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->defaultValue(0),
            'order' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $this->getTableOptions());
		
		$this->addForeignKeyTo('{{%advertisement_placeholder}}', 'placeholder_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropForeignKeyTo('{{%advertisement_placeholder}}', 'placeholder_id');
		$this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M200110075543CreateAdvertisement cannot be reverted.\n";

        return false;
    }
    */
}
