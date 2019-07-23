<?php

namespace MartinKozianka\User2GroupBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('MartinKozianka\User2GroupBundle\MartinKoziankaUser2GroupBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
                ->setReplace(['user2group']),
        ];
    }
}
