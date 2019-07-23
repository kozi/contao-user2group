<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2019 Leo Feyer
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2011-2019
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    user2group
 * @license    LGPL
 * @filesource
 */

array_insert($GLOBALS['BE_MOD']['accounts'], 4, [
    'user2group_viewer' => ['callback' => 'MartinKozianka\User2Group\ModuleUser2Group'],
]);
