<?php

namespace Dag\Component\Robots\Exception;

/**
 * Exception should be thrown when a rule does not exist.
 *
 * @author Christian Daguerre <christian@daguer.re>
 */
class RuleNotFoundException extends \Exception
{
    public function __construct($route, $host)
    {
        parent::__construct(sprintf('There is no rule for host "%s" and route "%s".', $route, $host));
    }
}
