<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Installer;

class Emoji_reactions_upd extends Installer
{
    public $has_cp_backend = 'y';
    public $has_publish_fields = 'n';

    public function install()
    {
        parent::install();

        // Seed the initial emojis
        $this->seedEmojis();

        return true;
    }

    public function update($current = '')
    {
        // Runs migrations
        parent::update($current);

        return true;
    }

    public function uninstall()
    {
        parent::uninstall();

        return true;
    }

    public function seedEmojis()
    {
        $data = [
            ['name' => 'smile','unicode' => '128513'],
            ['name' => 'thumbs-up','unicode' => '128077'],
            ['name' => 'thumbs-down','unicode' => '128078'],
            ['name' => 'heart-eyes','unicode' => '128525'],
            ['name' => 'one-hundred','unicode' => '128175'],
            ['name' => 'climbing','unicode' => '129495'],
            ['name' => 'sunrise-mountains','unicode' => '127748'],
            ['name' => 'sunrise','unicode' => '127749'],
            ['name' => 'angry','unicode' => '128545'],
            ['name' => 'fire','unicode' => '128293'],
            ['name' => 'surprise','unicode' => '127881'],
            ['name' => 'green-heart','unicode' => '128154'],
            ['name' => 'sunglasses','unicode' => '128526'],
            ['name' => 'head-explode','unicode' => '129327'],
        ];

        foreach($data as $emoji) {
            ee('Model')->make('emoji_reactions:Emoji')->set($emoji)->save();
        }
    }
}
