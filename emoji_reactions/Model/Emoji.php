<?php

namespace MattJohnson\EmojiReactions\Model;

use ExpressionEngine\Service\Model\Model;

class Emoji extends Model
{
    // Documentation: https://docs.expressionengine.com/latest/development/services/model/building-your-own.html
    // You can get this all instances of this model by using:
    // ee('Model')->get('emoji_reactions:Emoji')->all();

    protected static $_primary_key = 'emoji_id';
    protected static $_table_name = 'emoji';

    protected $emoji_id;
    protected $name;
    protected $unicode;

    protected static $_relationships = array(
        'Reactions' => array(
            'type' => 'hasMany',
            'model' => 'EmojiReaction',
        ),
    );
}
