<?php

use yii\db\Migration;

/**
 * Class m191120_095654_contacts
 */
class m191120_095654_contacts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'email' =>$this->string(100)->notNull(),
            'phone' =>$this->string(30)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191120_095654_contacts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191120_095654_contacts cannot be reverted.\n";

        return false;
    }
    */
}
