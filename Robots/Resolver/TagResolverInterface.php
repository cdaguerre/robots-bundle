<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
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
