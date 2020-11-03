<?php namespace Hampel\HideSidebar\XF\Pub\Controller;

use Hampel\HideSidebar\Option\HiddenNodes;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

class SearchForum extends XFCP_SearchForum
{
	public function actionView(ParameterBag $params)
	{
		$reply = parent::actionView($params);

		if ($reply instanceof View)
		{
			$searchForum = $reply->getParam('searchForum');

			if ($searchForum && HiddenNodes::inList($searchForum->getEntityId()))
			{
				$reply->setPageParam('skipSidebarWidgets', true);
			}
		}

		return $reply;
	}
}
