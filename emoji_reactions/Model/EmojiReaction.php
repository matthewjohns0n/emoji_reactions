<?php

namespace MattJohnson\EmojiReactions\Model;

use ExpressionEngine\Service\Model\Model;

class EmojiReaction extends Model
{
    // Documentation: https://docs.expressionengine.com/latest/development/services/model/building-your-own.html
    // You can get this all instances of this model by using:
    // ee('Model')->get('emoji_reactions:EmojiReaction')->all();

    protected static $_primary_key = 'emoji_reaction_id';
    protected static $_table_name = 'emoji_reaction';

    protected $emoji_reaction_id;
    protected $emoji_id;
    protected $entry_id;
    protected $member_id;
    protected $created;

    protected static $_events = array(
        'beforeInsert',
    );

    protected static $_typed_columns = array(
        'created' => 'timestamp'
    );

    protected static $_relationships = array(
        'Emoji' => array(
            'type' => 'belongsTo',
            'key' => 'emoji_id',
            'model' => 'Emoji'
        ),
        'ChannelEntry' => array(
            'type' => 'belongsTo',
            'key' => 'entry_id',
            'model' => 'ee:ChannelEntry'
        ),
        'Member' => array(
            'type' => 'belongsTo',
            'key' => 'member_id',
            'model' => 'ee:Member'
        ),
    );

    public function onBeforeInsert()
    {
        $this->setProperty('created', ee()->localize->now);
    }
}
