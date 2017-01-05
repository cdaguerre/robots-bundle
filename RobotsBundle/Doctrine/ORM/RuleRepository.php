<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Bundle\RobotsBundle\Doctrine\ORM;

use Dag\Component\Robots\Repository\RuleRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class RuleRepository extends EntityRepository implements RuleRepositoryInterface
{
}
