<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Bundle\RobotsBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class DagRobotsBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers()
    {
        return [SyliusResourceBundle::DRIVER_DOCTRINE_ORM];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Dag\Component\Robots\Model';
    }
}
