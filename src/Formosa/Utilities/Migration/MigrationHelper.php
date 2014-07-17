<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Utilities\Migration;

use Phinx\Migration\AbstractMigration;

/**
 * Class MigrationHelper
 *
 * @since 1.0
 */
class MigrationHelper
{
	/**
	 * getQuery
	 *
	 * @param AbstractMigration $migration
	 *
	 * @return  \Joomla\Database\DatabaseQuery
	 */
	public static function getQuery(AbstractMigration $migration)
	{
		$driver = static::getDriver($migration);

		$db = \Joomla\Database\DatabaseFactory::getInstance();

		return $db->getQuery($driver);
	}

	/**
	 * getConnector
	 *
	 * @param AbstractMigration $migration
	 *
	 * @return  \PDO
	 */
	public static function getConnector(AbstractMigration $migration)
	{
		/** @var $pdo \PDO */
		$pdo = $migration->getAdapter()->getConnection();

		return $pdo;
	}

	/**
	 * getDriver
	 *
	 * @param AbstractMigration $migration
	 *
	 * @return  string
	 */
	public static function getDriver(AbstractMigration $migration)
	{
		$pdo = static::getConnector($migration);

		return $pdo->getAttribute(\PDO::ATTR_DRIVER_NAME);
	}
}
 