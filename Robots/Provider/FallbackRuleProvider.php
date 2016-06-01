<?php

namespace Dag\Component\Robots\Provider;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class FallbackRuleProvider implements RuleProviderInterface
{
    /**
     * @var RuleProviderInterface
     */
    protected $defaultRuleProvider;

    /**
     * @var RuleProviderInterface
     */
    protected $fallbackRuleProvider;

    /**
     * @param RuleProviderInterface $defaultRuleProvider
     * @param RuleProviderInterface $fallbackRuleProvider
     */
    public function __construct(
        RuleProviderInterface $defaultRuleProvider,
        RuleProviderInterface $fallbackRuleProvider
    ) {
        $this->defaultRuleProvider = $defaultRuleProvider;
        $this->fallbackRuleProvider = $fallbackRuleProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function findMatching($route, $host)
    {
        try {
            return $this->defaultRuleProvider->findMatching($route, $host);
        } catch (\Exception $e) {
            return $this->fallbackRuleProvider->findMatching($route, $host);
        }
    }
}
