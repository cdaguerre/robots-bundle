<?php

namespace Dag\Component\Robots\Provider;

use Doctrine\Common\Cache\Cache;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class CachedRuleProvider implements RuleProviderInterface
{
    const TTL = 60;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var RuleProviderInterface
     */
    protected $ruleProvider;

    /**
     * @var int
     */
    protected $ttl;

    /**
     * @param RuleProviderInterface $ruleProvider
     * @param Cache                 $cache
     * @param int                   $ttl
     */
    public function __construct(RuleProviderInterface $ruleProvider, Cache $cache, $ttl = self::TTL)
    {
        $this->ruleProvider = $ruleProvider;
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    /**
     * {@inheritdoc}
     */
    public function findMatching($route, $host)
    {
        if ($this->cache->contains($this->getCacheKey())) {
            return $this->cache->fetch($this->getCacheKey());
        }

        $rules = $this->ruleProvider->getRules();
        $this->cache->save($this->getCacheKey(), $rules, $this->ttl);

        return $rules;
    }

    /**
     * @return string
     */
    private function getCacheKey()
    {
        return 'robot_rules';
    }
}
