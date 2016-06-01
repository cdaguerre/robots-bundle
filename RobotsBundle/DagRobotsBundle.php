<?php

namespace Dag\Bundle\RobotsBundle;

use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class DagRobotsBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return array(SyliusResourceBundle::DRIVER_DOCTRINE_ORM);
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelInterfaces()
    {
        return array('Dag\Component\Robots\Model\RuleInterface' => 'dag.robots.model.robot_rule.class');
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Dag\Component\Robots\Model';
    }
}
