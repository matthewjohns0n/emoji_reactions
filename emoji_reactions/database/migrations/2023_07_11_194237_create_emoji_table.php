<?php

use ExpressionEngine\Service\Migration\Migration;

class CreateEmojiTable extends Migration
{
    /**
     * Execute the migration
     * @return void
     */
    public function up()
    {
        $fields = array(
            'emoji_id' => array('type' => 'int', 'constraint' => '10', 'unsigned' => true, 'auto_increment' => true),
            'name' => array('type' => 'text'),
            'unicode' => array('type' => 'text'),
        );

        ee()->dbforge->add_field($fields);
        ee()->dbforge->add_key('emoji_id', true);
        ee()->dbforge->create_table('emoji');
    }

    /**
     * Rollback the migration
     * @return void
     */
    public function down()
    {
        ee()->dbforge->drop_table('emoji');
    }
}
