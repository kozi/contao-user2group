<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2017
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    user2group
 * @license    LGPL
 * @filesource
 */

array_insert($GLOBALS['BE_MOD']['accounts'], 4, [
	'user2group_viewer' => [
		'callback'   => 'ModuleUser2Group',
		'icon'       => 'system/themes/default/images/group.gif',
	]
]);


