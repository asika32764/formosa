<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Controller;

use Joomla\Application\AbstractApplication;
use Joomla\Controller\AbstractController;
use Joomla\Input\Input;
use Formosa\Factory;

/**
 * Class Controller
 *
 * @since 1.0
 */
abstract class Controller extends AbstractController
{
	/**
	 * The application object.
	 *
	 * @var    \Joomla\Application\AbstractApplication
	 * @since  1.0
	 */
	public $app;

	/**
	 * The input object.
	 *
	 * @var    \Joomla\Input\Input
	 * @since  1.0
	 */
	public $input;

	/**
	 * Instantiate the controller.
	 *
	 * @param   \Joomla\Input\Input                      $input  The input object.
	 * @param   \Joomla\Application\AbstractApplication  $app    The application object.
	 *
	 * @since  1.0
	 */
	public function __construct(Input $input = null, AbstractApplication $app = null)
	{
		$this->input = $input ? : new Input;
		$this->app = $app ? : Factory::getApplication();
	}
}
 