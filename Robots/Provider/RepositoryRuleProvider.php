<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Component\Robots\Provider;

use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class RepositoryRuleProvider implements RuleProviderInterface
{
    /**
     * @var RepositoryInterface
     */
    protected $ruleRepository;

    /**
     * @param RepositoryInterface $ruleRepository
     */
    public function __construct(RepositoryInterface $ruleRepository)
    {
        $this->ruleRepository = $ruleRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function findMatching($route, $host)
    {
        return $this->ruleRepository->findOneBy(['route' => $route, 'host' => $host]);
    }
}
