<?php

namespace MattJohnson\EmojiReactions\Library;

class ManageReactions
{
    public function getInfo($entry_id=null)
    {
        // Get all Reactions
        $reactions = ee('Model')->get('emoji_reactions:EmojiReaction');

        // Filter by entry_id if provided
        if($entry_id) {
            $reactions = $reactions->filter('entry_id', $entry_id);
        }

        $reactions = $reactions
            ->order('created', 'desc')
            ->all();


        $info = [];

        foreach ($reactions as $reaction) {
            $info[] = [
                $reaction->ChannelEntry->title,
                '&#'.$reaction->Emoji->unicode,
                $reaction->Member ? $reaction->Member->username : 'Guest',
                $reaction->created->setTimezone(new \DateTimeZone('America/Los_Angeles'))->format('F j, Y, g:i a'),
            ];
        }

        return $info;
    }


    public function getTable($entry_id=null)
    {
        $table = ee('CP/Table');
        $table->setColumns(
            [
                'Entry',
                'Emoji' => [
                    'encode' => false,
                ],
                'Member',
                'Date',
            ]
        );

        $table->setNoResultsText(sprintf(lang('no_found'), lang('no_reactions')));
        $table->setData($this->getInfo($entry_id));

        return $table;
    }
}

// EOF
