<?php

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
