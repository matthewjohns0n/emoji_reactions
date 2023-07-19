<?php

use ExpressionEngine\Addons\Pro\Service\Prolet\AbstractProlet;
use ExpressionEngine\Addons\Pro\Service\Prolet\ProletInterface;

class Emoji_reactions_pro extends AbstractProlet implements ProletInterface
{
    protected $name = 'Manage Reactions';
    protected $buttons = [];

    public function index()
    {
        $entry_id = ee('Request')->get('entry_id', null);

        $data['table'] = ee('emoji_reactions:ManageReactions')->getTable($entry_id)->viewData();

        return ee('View')->make('emoji_reactions:index')->render($data);
    }
}
