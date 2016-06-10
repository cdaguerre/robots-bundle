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
