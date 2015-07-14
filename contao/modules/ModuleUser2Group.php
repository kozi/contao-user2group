<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2015 <http://kozianka.de/>
 * @author     Martin Kozianka <http://kozianka.de/>
 * @package    user2group_viewer
 * @license    LGPL
 * @filesource
 */




/**
 * Class ModuleUser2Group
 *
 * @copyright  Martin Kozianka 2011-2015
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    user2group_viewer
 */
class ModuleUser2Group extends BackendModule {
    protected $strTemplate    = 'be_user2group';
    private $arrGroupList     = array();
    private $arrUserList      = array();

    protected function compile() {
        $this->loadLanguageFile('tl_user');

        $GLOBALS['TL_CSS'][] = 'system/modules/user2group/assets/user2group.css';

        $label['group']      = $GLOBALS['TL_LANG']['tl_user']['groups'][0];
        $label['user']       = $GLOBALS['TL_LANG']['tl_user']['name'][0];
        $label['admin']      = $GLOBALS['TL_LANG']['tl_user']['admin_legend'];

        $label['title']      = $GLOBALS['TL_LANG']['MSC']['user2group_title'];
        $label['no_groups']  = $GLOBALS['TL_LANG']['MSC']['user2group_no_groups'];


        $arrGroupList = [];
        $arrUserList  = [];


        // Get groups
        $objGroupCollection = \UserGroupModel::findAll(['order' => 'name ASC']);
        if ($objGroupCollection !== null) {
            foreach($objGroupCollection as $objGroup) {
                $this->addGroup($objGroup);
            }
        }

        // User
        $objUserCollection = \UserModel::findAll(['order' => 'name ASC']);
        if ($objUserCollection !== null) {
            foreach($objUserCollection as $objUser) {
                $this->addUser($objUser);
            }
        }

        $this->Template->label     = $label;
        $this->Template->userList  = $this->arrUserList;
        $this->Template->groupList = $this->arrGroupList;
    }

    private function addGroup($objGroup) {
        $objG           = (object) $objGroup->row();
        $objG->userList = array();

        $this->arrGroupList[$objG->id] = $objG;
    }

    private function addUser($objUser) {
        $objU            = (object) $objUser->row();
        $objU->groupList = array();
        $objU->groups    = deserialize($objU->groups);

        if ($objU->groups) {
            foreach($objU->groups as $gId) {
                $objU->groupList[] = $this->arrGroupList[$gId];

                $this->arrGroupList[$gId]->userList[] = $objU;
            }
        }

        $this->arrUserList[$objU->id] = $objU;
    }
}

