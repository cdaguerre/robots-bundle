<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
