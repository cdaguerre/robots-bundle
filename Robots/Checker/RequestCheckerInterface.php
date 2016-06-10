<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Component\Robots\Checker;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
interface RequestCheckerInterface
{
    /**
     * Check if the given request was made by a robot.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function isRobot(Request $request);

    /**
     * Check if the given request was made by a crawler.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function isCrawler(Request $request);
}
