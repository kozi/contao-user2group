<?php

/**
 * Contao Open Source CMS
* Copyright (C) 2005-2013 Leo Feyer
*
*
* PHP version 5
* @copyright  Martin Kozianka 2011-2013 <http://kozianka.de/>
* @author     Martin Kozianka <http://kozianka.de/>
* @package    user2group_viewer
* @license    LGPL
* @filesource
*/

/**
 * Class ModuleUser2Group 
 *
 * @copyright  Martin Kozianka 2011-2013 
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    user2group_viewer
 */
class ModuleUser2Group extends BackendModule {

	protected $strTemplate = 'be_user2group';
	protected function compile() {
		$GLOBALS['TL_CSS'][] = 'system/modules/user2group_viewer/assets/user2group.css';

		$this->loadLanguageFile('tl_user');
		$label['group']     = $GLOBALS['TL_LANG']['tl_user']['groups'][0];
		$label['user']      = $GLOBALS['TL_LANG']['tl_user']['name'][0];
		$label['admin']     = $GLOBALS['TL_LANG']['tl_user']['admin_legend'];

		$label['title']     = $GLOBALS['TL_LANG']['MSC']['user2group_title'];
		$label['no_groups'] = $GLOBALS['TL_LANG']['MSC']['user2group_no_groups'];


		$groups  = false;
		$allUser = array();
		
		// Groups
		$dbGroups = $this->Database->prepare("SELECT name, id FROM tl_user_group ORDER BY name ASC")->execute();
		if ($dbGroups->numRows > 0) {

			$groups = array();
			
			while ($dbGroups->next()) {
				$group = $dbGroups->row();	
				$group['user'] = array();
				$id = $group['id'];
				$groups[$id] = $group;
			}
			
		} // if ($dbGroups->numRows > 0)
		
		// User		
		$dbUser = $this->Database->prepare("SELECT * FROM tl_user ORDER BY name ASC")->execute();
		
		while ($dbUser->next()) {
			$user = $dbUser->row();
			$user['groups'] = unserialize($user['groups']);
			if ($user['groups']) {
				foreach($user['groups'] as $group_id) {
					$groups[$group_id]['user'][] = $user;
				}
			}
			$allUser[] = $user;
		}
		
		$this->Template->label    = $label;
		$this->Template->allUser  = $allUser;
		$this->Template->groups   = $groups;
		
		
	}
}


