<?php namespace Rb\Documentrb;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'rb\documentrb\components\FilterDocument' => 'filterdocument'
        ];
    }

    public function registerSettings()
    {
        /*register */
    }
}
