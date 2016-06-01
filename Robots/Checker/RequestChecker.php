<?php

namespace Dag\Component\Robots\Checker;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class RequestChecker implements RequestCheckerInterface
{
    /**
     * @var array
     */
    protected $crawlerUserAgents = array(
        'googlebot',
        'bingbot',
        'msnbot',
        'twitterbot',
        'yahoo',
        'baiduspider',
        'facebookexternalhit',
        'askjeeves',
        'teomabar',
    );

    /**
     * @param array $crawlerUserAgents Additionnal user agents.
     */
    public function __construct(array $crawlerUserAgents = array())
    {
        $this->crawlerUserAgents = array_flip(array_merge($this->crawlerUserAgents, $crawlerUserAgents));
    }

    /**
     * {@inheritdoc}
     */
    public function isRobot(Request $request)
    {
        $userAgent = strtolower($request->headers->get('User-Agent'));

        return isset($this->crawlerUserAgents[$userAgent]);
    }

    /**
     * {@inheritdoc}
     */
    public function isCrawler(Request $request)
    {
        if (null !== $request->query->get('_escaped_fragment_')) {
            return true;
        }

        return $this->isRobot($request);
    }
}
