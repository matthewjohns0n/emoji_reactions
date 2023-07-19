<?php

namespace MattJohnson\EmojiReactions\Actions;

use ExpressionEngine\Service\Addon\Controllers\Action\AbstractRoute;

class RecordReaction extends AbstractRoute
{
    public function process()
    {
        // Get the entry id and emoji unicode from the post vars and member id from the session
        $member_id = ee()->session->userdata('member_id');
        $entry_id = (int) ee('Request')->post('entry_id');
        $unicode = ee('Request')->post('unicode');

        // Get the emoji id from the unicode
        $emoji = ee('Model')->get('emoji_reactions:Emoji')
            ->filter('unicode', $unicode)
            ->first();

        // If the emoji doesn't exist, return false
        if(! $emoji) {
            return false;
        }

        // Create a new reaction
        $reaction = ee('Model')->make('emoji_reactions:EmojiReaction');
        $reaction->entry_id = $entry_id;
        $reaction->member_id = $member_id;
        $reaction->emoji_id = $emoji->emoji_id;
        $reaction->save();

        // Return the new reaction count
        $reactions = ee('Model')->get('emoji_reactions:EmojiReaction')
            ->filter('entry_id', $entry_id)
            ->filter('emoji_id', $emoji->emoji_id)
            ->count();

        return $reactions;
    }
}
