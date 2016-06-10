<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Component\Robots\Repository;

use Dag\Component\Robots\Model\RuleInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
interface RuleRepositoryInterface
{
    /**
     * Retrieve all rules.
     *
     * @return array|RuleInterface[]
     */
    public function findAll();
}
