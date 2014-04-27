<?php
/**
 * Part of formosa project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

define('FORMOSA_ROOT',     realpath(__DIR__ . '/..'));
define('FORMOSA_WWW',      __DIR__);
define('FORMOSA_TEMPLATE', FORMOSA_ROOT . '/templates');
define('FORMOSA_SOURCE',   FORMOSA_ROOT . '/src');
define('FORMOSA_ETC',      FORMOSA_ROOT . '/etc');

define('JPATH_ROOT',       FORMOSA_ROOT);

include __DIR__ . '/../vendor/autoload.php';

(new \Formosa\Application\Application)->execute();
