<?php

use ExpressionEngine\Service\Migration\Migration;

class CreateEmojiReactionTable extends Migration
{
    /**
     * Execute the migration
     * @return void
     */
    public function up()
    {
        $fields = array(
            'emoji_reaction_id' => array('type' => 'int', 'constraint' => '10', 'unsigned' => true, 'auto_increment' => true),
            'emoji_id' => array('type' => 'int', 'constraint' => '4', 'unsigned' => true, 'default' => 1),
            'entry_id' => array('type' => 'int', 'constraint' => '4', 'unsigned' => true, 'default' => 1),
            'member_id' => array('type' => 'int', 'constraint' => '4', 'unsigned' => true, 'default' => 1),
            'created' => array('type' => 'int', 'constraint' => '8', 'unsigned' => true, 'null' => false),
        );

        ee()->dbforge->add_field($fields);
        ee()->dbforge->add_key('emoji_reaction_id', true);
        ee()->dbforge->create_table('emoji_reaction');
    }

    /**
     * Rollback the migration
     * @return void
     */
    public function down()
    {
        ee()->dbforge->drop_table('emoji_reaction');
    }
}
