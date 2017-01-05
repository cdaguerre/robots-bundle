<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
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
