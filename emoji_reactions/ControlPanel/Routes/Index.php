<?php

namespace MattJohnson\EmojiReactions\ControlPanel\Routes;

use ExpressionEngine\Service\Addon\Controllers\Mcp\AbstractRoute;

class Index extends AbstractRoute
{
    /**
     * @var string
     */
    protected $route_path = 'index';

    /**
     * @var string
     */
    protected $cp_page_title = 'Index';

    /**
     * @param false $entry_id
     * @return AbstractRoute
     */
    public function process($entry_id = null)
    {
        $data['table'] = ee('emoji_reactions:ManageReactions')->getTable($entry_id)->viewData();

        $this->setBody('Index', $data);

        return $this;
    }
}
