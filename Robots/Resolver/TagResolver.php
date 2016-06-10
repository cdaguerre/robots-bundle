<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Component\Robots\Resolver;

use Dag\Component\Robots\Provider\RuleProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class TagResolver implements TagResolverInterface
{
    /**
     * @var RuleProviderInterface
     */
    protected $ruleProvider;

    /**
     * @param RuleProviderInterface $ruleProvider
     */
    public function __construct(RuleProviderInterface $ruleProvider)
    {
        $this->ruleProvider = $ruleProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Request $request)
    {
        $host = $this->extractHost($request);
        $route = $this->extractRoute($request);

        try {
            return $this->ruleProvider->findMatching($route, $host)->getTags();
        } catch (RuleNotFoundException $e) {
            return [];
        }
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function extractHost(Request $request)
    {
        return $request->getHost();
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function extractRoute(Request $request)
    {
        return $request->get('_route');
    }
}
