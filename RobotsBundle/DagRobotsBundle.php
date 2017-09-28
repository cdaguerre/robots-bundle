<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
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
    public function getSupportedDrivers(): array
    {
        return [SyliusResourceBundle::DRIVER_DOCTRINE_ORM];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace(): ?string
    {
        return 'Dag\Component\Robots\Model';
    }
}
