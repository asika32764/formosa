<?php
/**
 * Part of formosa project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Acme\Controller\Page;

use Acme\View\Page\PageHtmlView;
use Formosa\Utilities\Queue\Priority;
use Formosa\Utilities\Queue\PriorityQueueHelper;

/**
 * Class Get
 *
 * @since 1.0
 */
class Get extends \Formosa\Controller\Controller
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
		$view = new PageHtmlView(null, Priority::createQueue(FORMOSA_TEMPLATE . '/acme/page'));

		return $view->setLayout('index')->render();
	}
}
 