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

use Dag\Bundle\RobotsBundle\Doctrine\ORM\RuleRepository;
use Dag\Bundle\RobotsBundle\Form\Type\RuleType;
use Dag\Component\Robots\Model\Rule;
use Dag\Component\Robots\Model\RuleInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dag_robots');

        $rootNode
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
                ->scalarNode('rule_provider')->defaultValue('dag_robots.rule_provider.config')->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);
        $this->addRulesSection($rootNode);

        return $treeBuilder;
    }

    /**
     * Adds `resources` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addResourcesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('rule')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Rule::class)->end()
                                        ->scalarNode('interface')->defaultValue(RuleInterface::class)->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->end()
                                        ->scalarNode('repository')->defaultValue(RuleRepository::class)->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(RuleType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dag'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    /**
     * Adds `rules` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addRulesSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('rules')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('route')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->arrayNode('tags')
                                ->prototype('enum')->values($this->getTags())->end()
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->arrayNode('hosts')
                                ->prototype('scalar')->end()
                                ->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    /**
     * @return array
     */
    private function getTags()
    {
        return ['noindex', 'nofollow', 'none', 'noarchive', 'nosnippet', 'noodp', 'notranslate', 'noimageindex'];
    }
}
