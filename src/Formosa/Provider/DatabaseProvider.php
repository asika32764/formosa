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
use Formosa\Factory;
use Windwalker\Database\DatabaseFactory;

/**
 * Class WhoopsProvider
 *
 * @since 1.0
 */
class DatabaseProvider implements ServiceProviderInterface
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
		$option = array(
			'driver' => $this->config->get('database.driver'),
			'host' => $this->config->get('database.host'),
			'user' => $this->config->get('database.user'),
			'password' => $this->config->get('database.password'),
			'database' => $this->config->get('database.name'),
		);

		Factory::$db = DatabaseFactory::getDbo($option);

		$container->share(
			'db',
			function() use($option)
			{
				return Factory::getDbo();
			}
		);
	}
}
 