<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2012
 * @author     Martin Kozianka <http://kozianka-online.de>
 * @package    user2group_viewer
 * @license    LGPL
 * @filesource
 */


/**
 * Class ModuleBackupDB 
 *
 * @copyright  Martin Kozianka 2011-2012 
 * @author     Martin Kozianka <http://kozianka-online.de>
 * @package    user2group_viewer
 */
class ModuleUser2Group extends BackendModule {

	protected $strTemplate = 'mod_user2group';
	protected function compile() {
		$GLOBALS['TL_CSS'][] = 'system/modules/user2group_viewer/html/user2group.css';
		
		$this->loadLanguageFile('tl_user');
		$label['group'] = $GLOBALS['TL_LANG']['tl_user']['groups'][0];
		$label['user']  = $GLOBALS['TL_LANG']['tl_user']['name'][0];
		$label['admin'] = $GLOBALS['TL_LANG']['tl_user']['admin_legend'];

		$label['title'] = $GLOBALS['TL_LANG']['MSC']['user2group_title'];
		$label['no_groups'] = $GLOBALS['TL_LANG']['MSC']['user2group_no_groups'];


		$groups = false;
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
		
		$this->Template->label = $label;
		$this->Template->allUser = $allUser;
		$this->Template->groups = $groups;
		
		
	}
}

?>