<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Component\Robots\Resolver;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
interface TagResolverInterface
{
    /**
     * Resolve robot tags for the given request;.
     *
     * @param Request $request
     *
     * @return string|array
     */
    public function resolve(Request $request);
}
