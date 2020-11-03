<?php namespace Hampel\HideSidebar\XF\Pub\Controller;

use Hampel\HideSidebar\Option\HiddenNodes;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

class Thread extends XFCP_Thread
{
	public function actionIndex(ParameterBag $params)
	{
		$reply = parent::actionIndex($params);

		if ($reply instanceof View)
		{
			$forum = $reply->getParam('forum');

			if ($forum && HiddenNodes::inList($forum->getEntityId()))
			{
				$reply->setPageParam('skipSidebarWidgets', true);
			}
		}

		return $reply;
	}
}
