<?php namespace Pkurg\CardSlider;

use System\Classes\PluginBase;
use Event;

class Plugin extends PluginBase
{

	public $require = ['RainLab.Blog'];
	
	public function registerComponents()
	{

		return [
			'Pkurg\CardSlider\Components\CardSlider' => 'cardslider',
			'Pkurg\CardSlider\Components\SmallCardSlider' => 'smallcardslider',
		];

	}

	public function registerSettings()
	{

	}



}
