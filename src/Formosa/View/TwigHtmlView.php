<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Formosa\View;

use Formosa\View\Twig\FormosaExtension;
use Windwalker\Data\Data;

/**
 * Class TwigHtmlView
 *
 * @since 1.0
 */
class TwigHtmlView extends HtmlView
{
	/**
	 * render
	 *
	 * @return  string
	 *
	 * @throws \RuntimeException
	 */
	public function render()
	{
		$this->getName();

		$this->prepareData($this->getData());

		$loader = new \Twig_Loader_Filesystem(iterator_to_array($this->getPaths()));
		$loader->addPath(FORMOSA_TEMPLATE . '/_global');

		$twig = new \Twig_Environment($loader);

		$twig->addExtension(new FormosaExtension);

		$data = $this->getData();

		$data->view = new Data;

		$data->view->name = $this->getName();
		$data->view->layout = $this->getLayout();

		return $twig->render($this->getLayout() . '.twig', iterator_to_array($data));
	}
}
 