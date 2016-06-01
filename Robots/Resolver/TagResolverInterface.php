<?php

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
