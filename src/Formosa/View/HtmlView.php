<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\View;

use Joomla\View\AbstractHtmlView;
use Windwalker\Data\Data;

/**
 * Class HtmlView
 *
 * @since 1.0
 */
class HtmlView extends AbstractHtmlView
{
	/**
	 * Property data.
	 *
	 * @var  \Windwalker\Data\Data
	 */
	protected $data = null;

	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = null;

	/**
	 * getData
	 *
	 * @return  \Windwalker\Data\Data
	 */
	public function getData()
	{
		if (!$this->data)
		{
			$this->data = new Data;
		}

		return $this->data;
	}

	/**
	 * setData
	 *
	 * @param   \Windwalker\Data\Data $data
	 *
	 * @return  TwigHtmlView  Return self to support chaining.
	 */
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * getName
	 *
	 * @return  string
	 */
	public function getName()
	{
		if (!$this->name)
		{
			$name = get_called_class();

			$name = explode('\\', $name);

			array_pop($name);

			$name = array_pop($name);

			$this->name = strtolower($name);
		}

		return $this->name;
	}

	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
	}
}
 