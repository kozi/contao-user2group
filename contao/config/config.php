<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2015
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    user2group_viewer
 * @license    LGPL
 * @filesource
 */

array_insert($GLOBALS['BE_MOD']['accounts'], 4, array
(
	'user2group_viewer' => array (
		'callback'   => 'ModuleUser2Group',
		'icon'       => 'system/themes/default/images/group.gif',
	)
));


