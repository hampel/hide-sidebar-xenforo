<?php namespace Hampel\HideSidebar\Option;

use XF\Option\AbstractOption;

class HiddenNodes extends AbstractOption
{
	public static function verifyOption(&$value, \XF\Entity\Option $option)
	{
		if (!empty($value))
		{
			Helper::sortStringList($value);
		}

		return true;
	}

	public static function get()
	{
		return Helper::stringListToArray(\XF::options()->hampelHideSidebarNodes);
	}

	public static function inList($nodeId)
	{
		return in_array($nodeId, self::get());
	}
}
