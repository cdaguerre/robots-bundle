<?php

namespace Dag\Component\Robots\Provider;

use Dag\Component\Robots\Model\Rule;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class ArrayRuleProvider implements RuleProviderInterface
{
    /**
     * @var array
     */
    protected $rules;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function findMatching($route, $host)
    {
        $rule = new Rule();
        $rule->setHost($host);
        $rule->setRoute($route);

        if (isset($this->rules[$route][$host])) {
            $rule->setTags($this->rules[$route][$host]);
        }

        return $rule;
    }
}
