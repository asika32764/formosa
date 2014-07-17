<?php
/**
 * Part of formosa project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa;

use Joomla\DI\Container;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class Factory
 *
 * @since 1.0
 */
class Factory
{
	/**
	 * Property instances.
	 *
	 * @var  array
	 */
	public static $container = null;

	/**
	 * Property db.
	 *
	 * @var  \Joomla\Database\DatabaseDriver
	 */
	public static $db = null;

	/**
	 * Property app.
	 *
	 * @var  \Formosa\Application\Application
	 */
	public static $app = null;

	/**
	 * Property session.
	 *
	 * @var \Symfony\Component\HttpFoundation\Session\Session
	 */
	public static $session;

	/**
	 * getContainer
	 *
	 * @return  Container
	 */
	public static function getContainer()
	{
		if (empty(static::$container))
		{
			static::$container = new Container;
		}

		return static::$container;
	}

	/**
	 * getDbo
	 *
	 * @return  \Joomla\Database\DatabaseDriver
	 */
	public static function getDbo()
	{
		if (empty(static::$db))
		{
			static::$db = static::getContainer()->get('db');
		}

		return static::$db;
	}

	/**
	 * getApp
	 *
	 * @throws  \RuntimeException
	 * @return  \Formosa\Application\Application
	 */
	public static function getApplication()
	{
		if (empty(static::$app))
		{
			throw new \RuntimeException('No application now.');
		}

		return static::$app;
	}

	/**
	 * getSession
	 *
	 * @return  Session
	 */
	public static function getSession()
	{
		if (empty(static::$session))
		{
			static::$session = new Session;
		}

		return static::$session;
	}
}
 