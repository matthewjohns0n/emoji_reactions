<?php

namespace MattJohnson\EmojiReactions\Widgets;

use ExpressionEngine\Addons\Pro\Service\Dashboard;

class ShowReactions extends Dashboard\AbstractDashboardWidget implements Dashboard\DashboardWidgetInterface
{
    public function getTitle()
    {
        return lang('Emoji Reactions: ShowReactions');
    }

    public function getContent()
    {
        $data['table'] = ee('emoji_reactions:ManageReactions')->getTable()->viewData();

        return ee('View')->make('emoji_reactions:index')->render($data);
    }

    public function getRightHead()
    {
        return '<a href="' . ee('CP/URL', 'addons/settings/emoji_reactions') . '" class="button button--default button--small">' . lang('Emoji Reactions') . '</a>';
    }
}
