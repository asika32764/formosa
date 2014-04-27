<?php
/**
 * Part of formosa project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Controller;

use Formosa\Model\PageModel;
use Formosa\View\Page\HtmlView;
use Joomla\Controller\AbstractController;

/**
 * Class PageController
 *
 * @since 1.0
 */
class PageController extends AbstractController
{
	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @since   1.0
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		$paths = new \SplPriorityQueue;

		$paths->insert(FORMOSA_TEMPLATE, 'normal');

		$view = new HtmlView(new PageModel, $paths);

		return $view->setLayout('page')->render();
	}
}
 