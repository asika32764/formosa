<?php
/**
 * Part of auth project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

$start_time = microtime(TRUE);

$i = 1;
$second = 5;

while (true)
{
	file_get_contents($argv[1]);

	echo '.';

	$current_time = microtime(TRUE);

	if (($current_time - $start_time) >= $second)
	{
		echo sprintf("\n\n%s times in %s seconds.", $i, $second) . "\n\n";

		die;
	}

	$i++;
}

$end_time = microtime(TRUE);

echo "\n\n" . $end_time - $start_time . "\n";