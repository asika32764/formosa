<?php
/**
 * Part of formosa project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Application;

use Formosa\Provider\WhoopsProvider;
use Joomla\Registry\Registry;
use Windwalker\DI\Container;
use Windwalker\Router\RestRouter;

/**
 * Class Application
 *
 * @since 1.0
 */
class Application extends WebApplication
{
	/**
	 * registerProviders
	 *
	 * @param Container $container
	 *
	 * @return  void
	 */
	protected function registerProviders(Container $container)
	{
		parent::registerProviders($container);

		if (FORMOSA_DEBUG)
		{
			$container->registerServiceProvider(new WhoopsProvider($this->config));
		}
	}

	/**
	 * loadConfiguration
	 *
	 * @param Registry $config
	 *
	 * @throws  \RuntimeException
	 * @return  void
	 */
	protected function loadConfiguration($config)
	{
		$file = FORMOSA_ETC . '/config.yml';

		if (!is_file($file))
		{
			exit('Please copy config.dist.yml to config.yml');
		}

		$config->loadFile($file, 'yaml');
	}

	/**
	 * getRouter
	 *
	 * @return  \Joomla\Router\Router
	 */
	public function getRouter()
	{
		if (!$this->router)
		{
			$router = new RestRouter($this->input);

			$routing = $this->loadRoutingConfiguration();

			$router->setDefaultController($routing['_default'])
				->addMaps($routing)
				->setMethodInPostRequest(true);

			$this->router = $router;
		}

		return $this->router;
	}
}
 