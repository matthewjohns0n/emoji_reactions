<?php

return [
    'name'              => 'Emoji Reactions',
    'description'       => 'Allow users to react to channel entries with emojis',
    'version'           => '1.0.0',
    'author'            => 'Matt Johnson',
    'author_url'        => 'expressionengine.test',
    'namespace'         => 'MattJohnson\EmojiReactions',
    'settings_exist'    => true,
    'models' => [
        'EmojiReaction'    => 'Model\EmojiReaction',
        'Emoji'    => 'Model\Emoji',
    ],
    'services' => [
        'ManageReactions' => 'Library\ManageReactions',
    ]

];
