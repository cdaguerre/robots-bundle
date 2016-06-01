<?php

namespace Dag\Bundle\RobotsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;

class DagRobotsExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    /**
     * Service prefix.
     *
     * @var string
     */
    protected $applicationName = 'dag.robots';

    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $config = $this->configure(
            $config,
            new Configuration(),
            $container,
            self::CONFIGURE_LOADER | self::CONFIGURE_DATABASE | self::CONFIGURE_PARAMETERS | self::CONFIGURE_VALIDATORS | self::CONFIGURE_FORMS
        );

        $rules = array();

        foreach ($config['rules'] as $rule) {
            foreach ($rule['hosts'] as $host) {
                $rules[$rule['route']][$host] = $rule['tags'];
            }
        }

        $container->setParameter('dag.robots.rules', $rules);
        $container->setAlias('dag.robots.rule_provider', $config['rule_provider']);
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        if (!$container->hasExtension('doctrine_cache')) {
            throw new \RuntimeException('DoctrineCacheBundle must be registered!');
        }

        $container->prependExtensionConfig('doctrine_cache', array(
            'providers' => array(
                'dag_robots' => '%sylius.cache%',
            ),
        ));
    }
}
