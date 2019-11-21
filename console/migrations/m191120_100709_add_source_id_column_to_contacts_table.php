<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contacts}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%source}}`
 */
class m191120_100709_add_source_id_column_to_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contacts}}', 'source_id', $this->integer()->notNull());

        // creates index for column `source_id`
        $this->createIndex(
            '{{%idx-contacts-source_id}}',
            '{{%contacts}}',
            'source_id'
        );

        // add foreign key for table `{{%source}}`
        $this->addForeignKey(
            '{{%fk-contacts-source_id}}',
            '{{%contacts}}',
            'source_id',
            '{{%source}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%source}}`
        $this->dropForeignKey(
            '{{%fk-contacts-source_id}}',
            '{{%contacts}}'
        );

        // drops index for column `source_id`
        $this->dropIndex(
            '{{%idx-contacts-source_id}}',
            '{{%contacts}}'
        );

        $this->dropColumn('{{%contacts}}', 'source_id');
    }
}
