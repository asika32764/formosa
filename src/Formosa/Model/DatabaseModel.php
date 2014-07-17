<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\Model;

use Joomla\Database\DatabaseDriver;
use Joomla\Model\AbstractDatabaseModel;
use Joomla\Registry\Registry;
use Formosa\Factory;

/**
 * Class DatabaseModel
 *
 * @since 1.0
 */
class DatabaseModel extends AbstractDatabaseModel
{
	/**
	 * Property cache.
	 *
	 * @var  array
	 */
	protected $cache = array();

	/**
	 * Instantiate the model.
	 *
	 * @param   DatabaseDriver  $db     The database adapter.
	 * @param   Registry        $state  The model state.
	 *
	 * @since   1.0
	 */
	public function __construct(DatabaseDriver $db = null, Registry $state = null)
	{
		$this->db = $db ? : Factory::getDbo();

		parent::__construct($this->db, $state);
	}

	/**
	 * getStoredId
	 *
	 * @param string $id
	 *
	 * @return  string
	 */
	public function getStoredId($id = null)
	{
		$id = $id . json_encode($this->state->toArray());

		return md5($id);
	}

	/**
	 * getCache
	 *
	 * @param string $id
	 *
	 * @return  mixed
	 */
	protected function getCache($id = null)
	{
		$id = $this->getStoredId($id);

		if (empty($this->cache[$id]))
		{
			return null;
		}

		return $this->cache[$id];
	}

	/**
	 * setCache
	 *
	 * @param string $id
	 * @param mixed  $item
	 *
	 * @return  mixed
	 */
	protected function setCache($id = null, $item = null)
	{
		$id = $this->getStoredId($id);

		$this->cache[$id] = $item;

		return $item;
	}

	/**
	 * hasCache
	 *
	 * @param string $id
	 *
	 * @return  bool
	 */
	protected function hasCache($id = null)
	{
		$id = $this->getStoredId($id);

		return !empty($this->cache[$id]);
	}
}
 