<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Component\Robots\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class Rule implements RuleInterface, ResourceInterface
{
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var array
     */
    protected $tags = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * {@inheritdoc}
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * {@inheritdoc}
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * {@inheritdoc}
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * {@inheritdoc}
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }
}
