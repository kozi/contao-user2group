<?php

/**
 * Contao Open Source CMS
* Copyright (C) 2005-2014 Leo Feyer
*
*
* PHP version 5
* @copyright  Martin Kozianka 2011-2014 <http://kozianka.de/>
* @author     Martin Kozianka <http://kozianka.de/>
* @package    user2group_viewer
* @license    LGPL
* @filesource
*/

ClassLoader::addClasses(array(
	'ModuleUser2Group'          => 'system/modules/user2group_viewer/modules/ModuleUser2Group.php'
));

TemplateLoader::addFiles(array(
	'be_user2group' 			=> 'system/modules/user2group_viewer/templates',
));

