<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
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
