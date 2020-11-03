<?php namespace Hampel\HideSidebar\XF\Pub\Controller;

use Hampel\HideSidebar\Option\HiddenNodes;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

class Forum extends XFCP_Forum
{
	public function actionForum(ParameterBag $params)
	{
		$reply = parent::actionForum($params);

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
