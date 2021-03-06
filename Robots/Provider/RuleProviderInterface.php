<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Component\Robots\Provider;

use Dag\Component\Model\RuleInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
interface RuleProviderInterface
{
    /**
     * Find rule matching the given route and host.
     *
     * @param string $route
     * @param string $host
     *
     * @return RuleInterface
     */
    public function findMatching($route, $host);
}
