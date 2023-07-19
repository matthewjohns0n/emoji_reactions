<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Mcp;

class Emoji_reactions_mcp extends Mcp
{
    protected $addon_name = 'emoji_reactions';
}
