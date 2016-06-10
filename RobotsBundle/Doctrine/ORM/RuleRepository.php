<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
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
