<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Provider;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * Class WhoopsProvider
 *
 * @since 1.0
 */
class WhoopsProvider implements ServiceProviderInterface
{
	/**
	 * Property config.
	 *
	 * @var \Joomla\Registry\Registry
	 */
	private $config;

	/**
	 * Class init.
	 *
	 * @param $config
	 */
	public function __construct($config)
	{
		$this->config = $config;
	}

	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function register(Container $container)
	{
		if ($this->config->get('system.debug'))
		{
			$whoops = new \Whoops\Run;

			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

			$whoops->register();

			$container->share('whoops', $whoops);
		}
	}
}
 