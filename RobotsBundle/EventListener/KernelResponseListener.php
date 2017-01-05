<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Bundle\RobotsBundle\EventListener;

use Dag\Component\Robots\Checker\RequestCheckerInterface;
use Dag\Component\Robots\Resolver\TagResolverInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class KernelResponseListener
{
    /**
     * @var RequestCheckerInterface
     */
    protected $requestChecker;

    /**
     * @var TagResolverInterface
     */
    protected $tagResolver;

    /**
     * @var bool
     */
    protected $cloak = false;

    /**
     * @param RequestCheckerInterface $requestChecker
     * @param TagResolverInterface    $tagResolver
     */
    public function __construct(RequestCheckerInterface $requestChecker, TagResolverInterface $tagResolver)
    {
        $this->requestChecker = $requestChecker;
        $this->tagResolver = $tagResolver;
    }

    /**
     * Add resolved tags to X-Robots-Tag response header.
     *
     * @param FilterResponseEvent $event
     */
    public function addRobotTags(FilterResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        if ($this->cloak && !$this->requestChecker->isCrawler($event->getRequest())) {
            return;
        }

        if ($tags = $this->tagResolver->resolve($event->getRequest())) {
            $event->getResponse()->headers->set('X-Robots-Tag', implode(', ', $tags));
        }
    }
}
