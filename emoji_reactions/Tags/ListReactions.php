<?php

namespace MattJohnson\EmojiReactions\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class ListReactions extends AbstractRoute
{
    // Example tag: {exp:emoji_reactions:list_reactions entry_id="{entry_id}"}
    public function process()
    {
        $entry_id = (int) ee()->TMPL->fetch_param('entry_id');

        // Get all emojis and current actions
        $emojis = ee('Model')->get('emoji_reactions:Emoji')->all();
        $reactions = ee('Model')->get('emoji_reactions:EmojiReaction')
            ->with('Emoji')
            ->filter('entry_id', $entry_id)
            ->all();


        // Build the HTML to send back
        $reactionBlock = '<div id="reactionBlock">';

        // Loop through each emoji and add a button for it
        foreach($emojis as $emoji) {
            $reactionCount = $reactions->filter('emoji_id', $emoji->emoji_id)->count();
            if($reactionCount == 0) {
                continue;
            }
            $reactionBlock .= '<button data-unicode="' . $emoji->unicode . '">&#' . $emoji->unicode . ' <span>' . $reactionCount . '</span></button>';
        }

        $reactionBlock .= '</div>';

        // Add hidden vars to the reaction block
        $reactionBlock .= $this->addHiddenVars($entry_id);

        return $reactionBlock;
    }

    private function addHiddenVars($entry_id)
    {
        // Add reaction url to the page
        $act_id = ee()->functions->fetch_action_id('Emoji_reactions', 'RecordReaction');
        $hiddenVars = '<input type="hidden" id="reactionUrl" value="' . ee()->functions->fetch_site_index(0, 0) . '?ACT=' . $act_id . '">';
        $hiddenVars .= '<input type="hidden" id="reactionXid" value="' . CSRF_TOKEN . '">';
        $hiddenVars .= '<input type="hidden" id="entryId" value="' . $entry_id . '">';
        return $hiddenVars;
    }
}
