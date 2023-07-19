<?php

namespace MattJohnson\EmojiReactions\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class ReactButton extends AbstractRoute
{
    // Example tag: {exp:emoji_reactions:react_button}
    public function process()
    {
        // Get all the emojis
        $emojis = ee('Model')->get('emoji_reactions:Emoji')->all();

        $reactionButton = '<button class="emojiBtn">&#128578;</button>';
        $reactionButton .= '<ul id="emojiDropdown" class="hidden">';
        foreach($emojis as $emoji) {
            $reactionButton .= '<li data-unicode="' . $emoji->unicode . '">&#' . $emoji->unicode . '</li>';
        }
        $reactionButton .= '</ul>';

        return $reactionButton;
    }
}
