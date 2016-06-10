<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Bundle\RobotsBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class DagRobotsExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration($config, $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->registerResources('dag_robots', $config['driver'], $config['resources'], $container);

        $loader->load('services.xml');

        $rules = [];

        foreach ($config['rules'] as $rule) {
            foreach ($rule['hosts'] as $host) {
                $rules[$rule['route']][$host] = $rule['tags'];
            }
        }

        $container->setParameter('dag_robots.rules', $rules);
        $container->setAlias('dag_robots.rule_provider', $config['rule_provider']);
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        if (!$container->hasExtension('doctrine_cache')) {
            throw new \RuntimeException('DoctrineCacheBundle must be registered!');
        }

        $container->prependExtensionConfig('doctrine_cache', [
            'providers' => [
                'dag_robots' => '%sylius.cache%',
            ],
        ]);
    }
}
