<?php

use ExpressionEngine\Service\Migration\Migration;

class CreateactionrecordreactionforaddonemojiReactions extends Migration
{
    /**
     * Execute the migration
     * @return void
     */
    public function up()
    {
        ee('Model')->make('Action', [
            'class' => 'Emoji_reactions',
            'method' => 'RecordReaction',
            'csrf_exempt' => false,
        ])->save();
    }

    /**
     * Rollback the migration
     * @return void
     */
    public function down()
    {
        ee('Model')->get('Action')
            ->filter('class', 'Emoji_reactions')
            ->filter('method', 'RecordReaction')
            ->delete();
    }
}
