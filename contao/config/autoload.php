<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2017
 * @author     Martin Kozianka <http://kozianka.de/>
 * @package    user2group
 * @license    LGPL
 * @filesource
 */

ClassLoader::addClasses(array(
	'ModuleUser2Group'          => 'system/modules/user2group/modules/ModuleUser2Group.php'
));

TemplateLoader::addFiles(array(
	'be_user2group' 			=> 'system/modules/user2group/templates',
));

