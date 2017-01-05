<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
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
